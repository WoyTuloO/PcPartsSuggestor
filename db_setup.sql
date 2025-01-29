create sequence coolings_id_seq
    as integer;

alter sequence coolings_id_seq owner to dev_user;

create table cpus
(
    id    serial
        primary key,
    name  varchar(255)   not null,
    price numeric(10, 2) not null
);

alter table cpus
    owner to dev_user;

create table gpus
(
    id    serial
        primary key,
    name  varchar(255)   not null,
    price numeric(10, 2) not null
);

alter table gpus
    owner to dev_user;

create table motherboards
(
    id    serial
        primary key,
    name  varchar(255)   not null,
    price numeric(10, 2) not null
);

alter table motherboards
    owner to dev_user;

create table rams
(
    id    serial
        primary key,
    name  varchar(255)   not null,
    price numeric(10, 2) not null
);

alter table rams
    owner to dev_user;

create table coolers
(
    id    integer default nextval('coolings_id_seq'::regclass) not null
        constraint coolings_pkey
            primary key,
    name  varchar(255)                                         not null,
    price numeric(10, 2)                                       not null
);

alter table coolers
    owner to dev_user;

alter sequence coolings_id_seq owned by coolers.id;

create table cases
(
    id    serial
        primary key,
    name  varchar(255)   not null,
    price numeric(10, 2) not null
);

alter table cases
    owner to dev_user;

create table psus
(
    id    serial
        primary key,
    name  varchar(255)   not null,
    price numeric(10, 2) not null
);

alter table psus
    owner to dev_user;

create table users
(
    id         serial
        primary key,
    username   varchar(50)                         not null
        unique,
    password   varchar(255)                        not null,
    created_at timestamp default CURRENT_TIMESTAMP not null,
    updated_at timestamp default CURRENT_TIMESTAMP not null,
    is_admin   integer
);

alter table users
    owner to dev_user;

create table storages
(
    id    serial
        primary key,
    name  varchar(255)   not null,
    price numeric(10, 2) not null
);

alter table storages
    owner to dev_user;

create table set_components
(
    set_id         serial
        primary key,
    cpu_id         integer
        references cpus
        constraint set_components_cpu_id_fkey1
            references cpus,
    gpu_id         integer
        references gpus
        constraint set_components_gpu_id_fkey1
            references gpus,
    motherboard_id integer
        references motherboards
        constraint set_components_motherboard_id_fkey1
            references motherboards,
    ram_id         integer
        references rams
        constraint set_components_ram_id_fkey1
            references rams,
    cooler_id      integer
        constraint set_components_cooling_id_fkey
            references coolers
        constraint set_components_cooling_id_fkey1
            references coolers,
    case_id        integer
        references cases
        constraint set_components_case_id_fkey1
            references cases,
    psu_id         integer
        references psus
        constraint set_components_psu_id_fkey1
            references psus,
    storage_id     integer
        references storages
        constraint set_components_storage_id_fkey1
            references storages
);

alter table set_components
    owner to dev_user;

create table sets
(
    id                serial
        primary key,
    name              varchar(255)   not null,
    total_price       numeric(10, 2) not null,
    set_components_id integer
        unique
        references set_components
            on delete cascade,
    username          varchar(255)   not null
        references users (username)
            on delete cascade,
    preferences       varchar,
    priority          varchar,
    ram               varchar,
    storage           varchar
);

alter table sets
    owner to dev_user;

create procedure truncate_all_tables()
    language plpgsql
as
$$
BEGIN
    TRUNCATE TABLE users, cpus, gpus, motherboards, rams, coolers, cases, psus, sets, set_components CASCADE;
END;
$$;

alter procedure truncate_all_tables() owner to dev_user;

create function filter_sets(p_min_price numeric DEFAULT NULL::numeric, p_max_price numeric DEFAULT NULL::numeric, p_preferences text DEFAULT NULL::text, p_priority text DEFAULT NULL::text, p_ram text DEFAULT NULL::text, p_storage text DEFAULT NULL::text)
    returns TABLE(set_name text, cpu_name text, cpu_price numeric, gpu_name text, gpu_price numeric, motherboard_name text, motherboard_price numeric, ram_name text, ram_price numeric, cooler_name text, cooler_price numeric, psu_name text, psu_price numeric, storage_name text, storage_price numeric, case_name text, case_price numeric, total_price numeric, ram_size text, storage_size text)
    language plpgsql
as
$$
BEGIN
    RETURN QUERY EXECUTE
        'SELECT
            s.name::TEXT AS set_name,
            c.name::TEXT AS cpu_name, c.price AS cpu_price,
            g.name::TEXT AS gpu_name, g.price AS gpu_price,
            m.name::TEXT AS motherboard_name, m.price AS motherboard_price,
            r.name::TEXT AS ram_name, r.price AS ram_price,
            co.name::TEXT AS cooler_name, co.price AS cooler_price,
            p.name::TEXT AS psu_name, p.price AS psu_price,
            st.name::TEXT AS storage_name, st.price AS storage_price,
            ca.name::TEXT AS case_name, ca.price AS case_price,
            s.total_price AS total_price,
            s.ram::TEXT AS ram_size,
            s.storage::TEXT AS storage_size
        FROM
            sets s
            JOIN set_components sc ON s.set_components_id = sc.set_id
            LEFT JOIN cpus c ON sc.cpu_id = c.id
            LEFT JOIN gpus g ON sc.gpu_id = g.id
            LEFT JOIN motherboards m ON sc.motherboard_id = m.id
            LEFT JOIN rams r ON sc.ram_id = r.id
            LEFT JOIN coolers co ON sc.cooler_id = co.id
            LEFT JOIN psus p ON sc.psu_id = p.id
            LEFT JOIN storages st ON sc.storage_id = st.id
            LEFT JOIN cases ca ON sc.case_id = ca.id
        WHERE 1=1' ||
        CASE WHEN p_min_price IS NOT NULL THEN ' AND s.total_price >= ' || p_min_price ELSE '' END ||
        CASE WHEN p_max_price IS NOT NULL THEN ' AND s.total_price <= ' || p_max_price ELSE '' END ||
        CASE WHEN p_preferences IS NOT NULL THEN ' AND s.preferences = ''' || p_preferences || '''' ELSE '' END ||
        CASE WHEN p_priority IS NOT NULL THEN ' AND s.priority = ''' || p_priority || '''' ELSE '' END ||
        CASE WHEN p_ram IS NOT NULL THEN ' AND s.ram = ''' || p_ram || '''' ELSE '' END ||
        CASE WHEN p_storage IS NOT NULL THEN ' AND s.storage = ''' || p_storage || '''' ELSE '' END;
END;
$$;

alter function filter_sets(numeric, numeric, text, text, text, text) owner to dev_user;

create function filter_sets_by_user(p_username text)
    returns TABLE(set_name text, cpu_name text, cpu_price numeric, gpu_name text, gpu_price numeric, motherboard_name text, motherboard_price numeric, ram_name text, ram_price numeric, cooler_name text, cooler_price numeric, psu_name text, psu_price numeric, storage_name text, storage_price numeric, case_name text, case_price numeric, total_price numeric, ram_size text, storage_size text)
    language plpgsql
as
$$
BEGIN
    RETURN QUERY EXECUTE
        'SELECT
            s.name::TEXT AS set_name,
            c.name::TEXT AS cpu_name, c.price AS cpu_price,
            g.name::TEXT AS gpu_name, g.price AS gpu_price,
            m.name::TEXT AS motherboard_name, m.price AS motherboard_price,
            r.name::TEXT AS ram_name, r.price AS ram_price,
            co.name::TEXT AS cooler_name, co.price AS cooler_price,
            p.name::TEXT AS psu_name, p.price AS psu_price,
            st.name::TEXT AS storage_name, st.price AS storage_price,
            ca.name::TEXT AS case_name, ca.price AS case_price,
            s.total_price AS total_price,
            s.ram::TEXT AS ram_size,
            s.storage::TEXT AS storage_size
        FROM
            sets s
            JOIN set_components sc ON s.set_components_id = sc.set_id
            LEFT JOIN cpus c ON sc.cpu_id = c.id
            LEFT JOIN gpus g ON sc.gpu_id = g.id
            LEFT JOIN motherboards m ON sc.motherboard_id = m.id
            LEFT JOIN rams r ON sc.ram_id = r.id
            LEFT JOIN coolers co ON sc.cooler_id = co.id
            LEFT JOIN psus p ON sc.psu_id = p.id
            LEFT JOIN storages st ON sc.storage_id = st.id
            LEFT JOIN cases ca ON sc.case_id = ca.id
        WHERE
            s.username = ''' || p_username || '''';
END;
$$;

alter function filter_sets_by_user(text) owner to dev_user;

create function count_sets_by_user(p_username character varying) returns integer
    language plpgsql
as
$$
declare
    result integer;
begin
    select count(*) into result
    from sets
    where username = p_username;
    return result;
end;
$$;

alter function count_sets_by_user(varchar) owner to dev_user;

create function set_timestamps() returns trigger
    language plpgsql
as
$$
BEGIN
    IF TG_OP = 'INSERT' THEN
        NEW.created_at := CURRENT_TIMESTAMP;
        NEW.updated_at := CURRENT_TIMESTAMP;
    ELSIF TG_OP = 'UPDATE' THEN
        NEW.updated_at := CURRENT_TIMESTAMP;
    END IF;
    RETURN NEW;
END;
$$;

alter function set_timestamps() owner to dev_user;

create trigger trg_set_timestamps
    before insert or update
    on users
    for each row
execute procedure set_timestamps();