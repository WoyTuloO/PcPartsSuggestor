INSERT INTO public.gpus (id, name, price) VALUES (15, 'RTX 3060', 1300.00);
INSERT INTO public.gpus (id, name, price) VALUES (16, 'RTX 4070 super', 3000.00);
INSERT INTO public.gpus (id, name, price) VALUES (17, 'RTX 5070ti', 4000.00);
INSERT INTO public.gpus (id, name, price) VALUES (18, 'RX 9070xt', 3000.00);


INSERT INTO public.motherboards (id, name, price) VALUES (15, 'Asus prime b450m', 300.00);
INSERT INTO public.motherboards (id, name, price) VALUES (16, 'asrock pg lightning', 700.00);


INSERT INTO public.psus (id, name, price) VALUES (16, 'be quiet! Pure Power 11', 300.00);
INSERT INTO public.psus (id, name, price) VALUES (17, 'Chiftec 750w', 400.00);
INSERT INTO public.psus (id, name, price) VALUES (18, 'Chieftec PROTON 1000W', 630.00);
INSERT INTO public.psus (id, name, price) VALUES (15, 'be quiet! Pure Power 11 600W', 400.00);


INSERT INTO public.rams (id, name, price) VALUES (17, 'Kingston ddr4', 180.00);
INSERT INTO public.rams (id, name, price) VALUES (18, 'goodram ddr5', 400.00);


INSERT INTO public.storages (id, name, price) VALUES (15, 'WD Blue', 180.00);


INSERT INTO public.cases (id, name, price) VALUES (16, 'MSI MAG PANO ', 440.00);
INSERT INTO public.cases (id, name, price) VALUES (15, 'Endorfy ventum 200', 300.00);


INSERT INTO public.coolers (id, name, price) VALUES (15, 'box', 0.00);
INSERT INTO public.coolers (id, name, price) VALUES (16, 'Fera 5', 120.00);
INSERT INTO public.coolers (id, name, price) VALUES (17, 'Arctic Liquid Freezer 360', 360.00);


INSERT INTO public.cpus (id, name, price) VALUES (15, '5600x', 600.00);
INSERT INTO public.cpus (id, name, price) VALUES (16, 'ryzen 5 5600x', 600.00);
INSERT INTO public.cpus (id, name, price) VALUES (17, '7600', 880.00);
INSERT INTO public.cpus (id, name, price) VALUES (18, '9800x3d', 3100.00);


INSERT INTO public.set_components (set_id, cpu_id, gpu_id, motherboard_id, ram_id, cooler_id, case_id, psu_id, storage_id) VALUES (37, 16, 15, 15, 17, 15, 15, 16, 15);
INSERT INTO public.set_components (set_id, cpu_id, gpu_id, motherboard_id, ram_id, cooler_id, case_id, psu_id, storage_id) VALUES (38, 17, 16, 16, 18, 16, 15, 17, 15);
INSERT INTO public.set_components (set_id, cpu_id, gpu_id, motherboard_id, ram_id, cooler_id, case_id, psu_id, storage_id) VALUES (39, 18, 17, 16, 18, 17, 16, 18, 15);
INSERT INTO public.set_components (set_id, cpu_id, gpu_id, motherboard_id, ram_id, cooler_id, case_id, psu_id, storage_id) VALUES (40, 18, 18, 16, 18, 17, 15, 15, 15);


INSERT INTO public.users (id, username, password, created_at, updated_at, is_admin) VALUES (13, 'user2', '$2y$10$EoXh51CbL/XAcBQU7GnS3e7Is9dpHQw2D/Y/NiBlNbu7klZLtNoZi', '2025-01-19 15:06:11.416580', '2025-01-19 15:06:11.416580', 0);
INSERT INTO public.users (id, username, password, created_at, updated_at, is_admin) VALUES (11, 'admin', '$2y$10$/jGdVPdMPeGnDSydjFsyK.v6mcpXM.2WCvpDJWkD9qB6mZ0ovLDm2', '2025-01-19 15:04:58.653998', '2025-01-19 15:06:30.810134', 1);
INSERT INTO public.users (id, username, password, created_at, updated_at, is_admin) VALUES (12, 'user1', '$2y$10$/D3oRLmOLRXlXCIr32vvfeHI09bI46fBv1JBChGslByNwxO9DF4d6', '2025-01-19 15:05:12.328389', '2025-01-19 15:06:47.438450', 0);


INSERT INTO public.sets (id, name, total_price, set_components_id, username, preferences, priority, ram, storage) VALUES (13, 'Esport budzetowy', 3160.00, 37, 'user1', 'esports', 'upscaling', '16gb', '1tb');
INSERT INTO public.sets (id, name, total_price, set_components_id, username, preferences, priority, ram, storage) VALUES (14, 'AAA sredni budzet', 5980.00, 38, 'user1', 'balance', 'upscaling', '32gb', '1tb');
INSERT INTO public.sets (id, name, total_price, set_components_id, username, preferences, priority, ram, storage) VALUES (15, 'High end ', 9960.00, 39, 'user2', 'balance', 'balance', '32gb', '2tb');
INSERT INTO public.sets (id, name, total_price, set_components_id, username, preferences, priority, ram, storage) VALUES (16, 'Full AMD', 8440.00, 40, 'user2', 'balance', 'balance', '32gb', '1tb');


DO $$
    BEGIN
        PERFORM setval('cpus_id_seq', (SELECT COALESCE(MAX(id), 0) FROM cpus) + 1, false);
        RAISE NOTICE 'Sekwencja cpus_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM cpus) + 1;

        PERFORM setval('gpus_id_seq', (SELECT COALESCE(MAX(id), 0) FROM gpus) + 1, false);
        RAISE NOTICE 'Sekwencja gpus_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM gpus) + 1;

        PERFORM setval('motherboards_id_seq', (SELECT COALESCE(MAX(id), 0) FROM motherboards) + 1, false);
        RAISE NOTICE 'Sekwencja motherboards_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM motherboards) + 1;

        PERFORM setval('rams_id_seq', (SELECT COALESCE(MAX(id), 0) FROM rams) + 1, false);
        RAISE NOTICE 'Sekwencja rams_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM rams) + 1;

        PERFORM setval('coolings_id_seq', (SELECT COALESCE(MAX(id), 0) FROM coolers) + 1, false);
        RAISE NOTICE 'Sekwencja coolings_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM coolers) + 1;

        PERFORM setval('cases_id_seq', (SELECT COALESCE(MAX(id), 0) FROM cases) + 1, false);
        RAISE NOTICE 'Sekwencja cases_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM cases) + 1;

        PERFORM setval('psus_id_seq', (SELECT COALESCE(MAX(id), 0) FROM psus) + 1, false);
        RAISE NOTICE 'Sekwencja psus_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM psus) + 1;

        PERFORM setval('users_id_seq', (SELECT COALESCE(MAX(id), 0) FROM users) + 1, false);
        RAISE NOTICE 'Sekwencja users_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM users) + 1;

        PERFORM setval('storages_id_seq', (SELECT COALESCE(MAX(id), 0) FROM storages) + 1, false);
        RAISE NOTICE 'Sekwencja storages_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM storages) + 1;

        PERFORM setval('set_components_set_id_seq', (SELECT COALESCE(MAX(set_id), 0) FROM set_components) + 1, false);
        RAISE NOTICE 'Sekwencja set_components_set_id_seq ustawiona na %', (SELECT COALESCE(MAX(set_id), 0) FROM set_components) + 1;

        PERFORM setval('sets_id_seq', (SELECT COALESCE(MAX(id), 0) FROM sets) + 1, false);
        RAISE NOTICE 'Sekwencja sets_id_seq ustawiona na %', (SELECT COALESCE(MAX(id), 0) FROM sets) + 1;
    END;
$$;
