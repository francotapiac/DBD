CREATE TABLE actividad_lugars (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_lugar integer,
    id_actividad integer
);

CREATE TABLE paquete_habitacions (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_paquete integer,
    id_habitacion integer
);

CREATE TABLE paquete_vuelos (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_paquete integer,
    id_vuelo integer
);

CREATE TABLE reserva_actividads (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_reserva integer,
    id_actividad integer
);

CREATE TABLE reserva_habitacions (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_reserva integer,
    id_habitacion integer
);

CREATE TABLE reserva_paquetes (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_reserva integer,
    id_paquete integer
);

CREATE TABLE reserva_vehiculos (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_reserva integer,
    id_vehiculo integer
);

CREATE TABLE reserva_vuelos (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_reserva integer,
    id_vuelo integer
);

CREATE TABLE rol_permisos (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_rol integer,
    id_permiso integer
);

CREATE TABLE usuario_rols (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_usuario integer,
    id_rol integer
);

CREATE TABLE vuelo_asientos (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_vuelo integer,
    id_asiento integer
);

CREATE TABLE vuelo_escalas (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_vuelo integer,
    id_escala integer
);

CREATE TABLE vuelo_seguros (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_vuelo integer,
    id_seguro integer
);

CREATE TABLE paquetes (
    id_paquete integer NOT NULL,
    precio_por_persona numeric(8,2) NOT NULL,
    descripcion text NOT NULL,
    descuento numeric(8,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE reservas (
    id_reserva integer NOT NULL,
    fecha_reserva date NOT NULL,
    hora_reserva time(0) without time zone NOT NULL,
    detalle_reserva text NOT NULL,
    tipo_pago integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_usuario integer
);

CREATE TABLE rols (
    id_rol integer NOT NULL,
    nombre character varying(15) NOT NULL,
    descripcion text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


CREATE TABLE paquete_vehiculos (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_paquete integer,
    id_vehiculo integer
);

CREATE TABLE paquete_traslados (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_paquete integer,
    id_traslado integer
);

CREATE TABLE paquete_actividads (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_paquete integer,
    id_actividad integer
);

CREATE TABLE actividads (
    id_actividad integer NOT NULL,
    nombre character varying(45) NOT NULL,
    descripcion text NOT NULL,
    costo numeric(8,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE aeropuertos (
    id_aeropuerto integer NOT NULL,
    nombre_aeropuerto character varying(70) NOT NULL,
    tipo_aeropuerto boolean NOT NULL,
    numero_contacto character varying(30) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_lugar integer
);

CREATE TABLE asientos (
    id_asiento integer NOT NULL,
    numero_asiento integer NOT NULL,
    letra_asiento character varying(3) NOT NULL,
    tipo_asiento integer NOT NULL,
    disponibilidad boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE escalas (
    id_escala integer NOT NULL,
    cambio_avion boolean NOT NULL,
    cambio_aeropuerto boolean NOT NULL,
    duracion_escala integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_lugar integer
);

CREATE TABLE habitacions (
    id_habitacion integer NOT NULL,
    descripcion text NOT NULL,
    capacidad integer NOT NULL,
    precio_noche numeric(8,2) NOT NULL,
    disponibilidad boolean NOT NULL,
    fecha_llegada date NOT NULL,
    fecha_ida date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE historials (
    id_historial integer NOT NULL,
    descripcion text NOT NULL,
    accion character varying(64) NOT NULL,
    fecha_accion date NOT NULL,
    hora_accion time(0) without time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE hotels (
    id_hotel integer NOT NULL,
    nombre character varying(45) NOT NULL,
    telefono character varying(20) NOT NULL,
    compania character varying(70) NOT NULL,
    calificacion integer NOT NULL,
    descripcion text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE lugars (
    id_lugar integer NOT NULL,
    pais character varying(100) NOT NULL,
    ciudad character varying(50) NOT NULL,
    direccion_lugar character varying(200) NOT NULL,
    codigo_postal character varying(15) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE permisos (
    id_permiso integer NOT NULL,
    nombre character varying(45) NOT NULL,
    descripcion text NOT NULL,
    tipo integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE seguros (
    id_seguro integer NOT NULL,
    nombre_seguro character varying(70) NOT NULL,
    descripcion character varying(280) NOT NULL,
    precio numeric(8,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE traslados (
    id_traslado integer NOT NULL,
    precio numeric(8,2) NOT NULL,
    capacidad integer NOT NULL,
    compania character varying(70) NOT NULL,
    fecha_traslado date NOT NULL,
    direccion_destino character varying(200) NOT NULL,
    tipo_traslado integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_reserva integer
);

CREATE TABLE users (
    id integer NOT NULL,
    primer_nombre character varying(45) NOT NULL,
    segundo_nombre character varying(45) NOT NULL,
    primer_apellido character varying(36) NOT NULL,
    segundo_apellido character varying(36) NOT NULL,
    email character varying(255) NOT NULL,
    fecha_nacimiento date NOT NULL,
    edad integer NOT NULL,
    ciudad_residencia character varying(100) NOT NULL,
    calle_residencia character varying(100) NOT NULL,
    pais_residencia character varying(60) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    numero_celular character varying(30) NOT NULL,
    tipo_documento integer NOT NULL,
    tipo_pago integer NOT NULL,
    estado integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE vehiculos (
    id_vehiculo integer NOT NULL,
    fecha_recogida date NOT NULL,
    fecha_devolucion date NOT NULL,
    compania character varying(45) NOT NULL,
    precio_diario numeric(8,2) NOT NULL,
    nombre character varying(40) NOT NULL,
    capacidad integer NOT NULL,
    disponibilidad boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_lugar integer
);

CREATE TABLE vuelos (
    id_vuelo integer NOT NULL,
    fecha_ida date NOT NULL,
    fecha_vuelta date NOT NULL,
    hora_salida time(0) without time zone NOT NULL,
    hora_llegada time(0) without time zone NOT NULL,
    duracion_vuelo numeric(8,2) NOT NULL,
    precio numeric(8,2) NOT NULL,
    numero_paradas integer NOT NULL,
    tipo_vuelo boolean NOT NULL,
    equipaje integer NOT NULL,
    disponibilidad boolean NOT NULL,
    aerolinea character varying(70) NOT NULL,
    id_aeropuerto_origen integer,
    id_aeropuerto_destino integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--                 Insert


INSERT INTO aeropuertos VALUES (1, 'Johnston-Koss', false, '1-210-654-1612 x851', '2018-12-27 03:38:50', '2018-12-27 03:38:50', 5);
INSERT INTO aeropuertos VALUES (2, 'Rath, Hackett and Adams', false, '(679) 771-9141 x763', '2018-12-27 03:38:50', '2018-12-27 03:38:50', 14);
INSERT INTO aeropuertos VALUES (3, 'McKenzie-Towne', true, '857.459.6586', '2018-12-27 03:38:50', '2018-12-27 03:38:50', 15);
INSERT INTO aeropuertos VALUES (4, 'Sanford, Ward and Schneider', false, '+12753640589', '2018-12-27 03:38:50', '2018-12-27 03:38:50', 4);
INSERT INTO aeropuertos VALUES (5, 'Wuckert Ltd', false, '747-256-4910 x7597', '2018-12-27 03:38:50', '2018-12-27 03:38:50', 4);
INSERT INTO aeropuertos VALUES (6, 'Barton Group', false, '865.562.6689 x0437', '2018-12-27 03:38:50', '2018-12-27 03:38:50', 5);


INSERT INTO asientos VALUES (1, 16, 'B', 1, true, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO asientos VALUES (2, 32, 'C', 1, false, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO asientos VALUES (3, 39, 'G', 1, true, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO asientos VALUES (4, 13, 'E', 1, true, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO asientos VALUES (5, 44, 'C', 1, true, '2018-12-27 03:38:50', '2018-12-27 03:38:50');


INSERT INTO escalas VALUES (1, true, false, 3, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 14);
INSERT INTO escalas VALUES (2, true, false, 8, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 20);
INSERT INTO escalas VALUES (3, true, true, 20, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 17);
INSERT INTO escalas VALUES (4, true, true, 9, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 20);
INSERT INTO escalas VALUES (5, false, false, 7, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 4);


INSERT INTO habitacions VALUES (1, 'Alice. ''I''m a--I''m a--'' ''Well! WHAT are you?'' said Alice, who was trembling down to her daughter ''Ah, my dear! Let this be a book written about me, that there ought! And when I get SOMEWHERE,'' Alice.', 7, 498.20, false, '2019-07-08', '2020-01-22', '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO habitacions VALUES (2, 'YOU?'' said the Cat. ''I''d nearly forgotten to ask.'' ''It turned into a cucumber-frame, or something of the trees behind him. ''--or next day, maybe,'' the Footman went on growing, and very angrily. ''A.', 5, 352.30, false, '2020-07-23', '2019-08-16', '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO habitacions VALUES (3, 'Alice''s shoulder, and it said nothing. ''Perhaps it hasn''t one,'' Alice ventured to ask. ''Suppose we change the subject of conversation. ''Are you--are you fond--of--of dogs?'' The Mouse only growled in.', 5, 588.80, true, '2019-05-16', '2019-02-15', '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO habitacions VALUES (4, 'She said it to speak first, ''why your cat grins like that?'' ''It''s a mineral, I THINK,'' said Alice. ''I''ve so often read in the after-time, be herself a grown woman; and how she would gather about her.', 7, 795.80, true, '2020-08-23', '2019-01-30', '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO habitacions VALUES (5, 'But she went on. ''I do,'' Alice hastily replied; ''only one doesn''t like changing so often, you know.'' ''And what are they doing?'' Alice whispered to the shore. CHAPTER III. A Caucus-Race and a Dodo, a.', 6, 905.30, true, '2020-10-05', '2019-05-29', '2018-12-27 03:38:51', '2018-12-27 03:38:51');


INSERT INTO historials VALUES (1, 'King, the Queen, tossing her head in the last words out loud, and the two creatures, who had been looking over their shoulders, that all the children she knew, who might do something better with the.', 'Soluta aut architecto reiciendis quam voluptatibus iure.', '2000-06-18', '07:16:50', '2018-12-27 03:38:52', '2018-12-27 03:38:52');
INSERT INTO historials VALUES (2, 'Let this be a person of authority among them, called out, ''Sit down, all of them at dinn--'' she checked herself hastily. ''I don''t like the Queen?'' said the Cat. ''Do you play croquet with the time,''.', 'Ex et quibusdam voluptate.', '1974-02-28', '00:08:22', '2018-12-27 03:38:52', '2018-12-27 03:38:52');
INSERT INTO historials VALUES (3, 'Why, there''s hardly enough of me left to make the arches. The chief difficulty Alice found at first was in the pool, and the procession came opposite to Alice, she went slowly after it: ''I never.', 'Aut nihil minus cumque veniam et.', '1991-06-10', '01:32:48', '2018-12-27 03:38:52', '2018-12-27 03:38:52');
INSERT INTO historials VALUES (4, 'I''m never sure what I''m going to give the hedgehog to, and, as a drawing of a large ring, with the name again!'' ''I won''t have any pepper in that ridiculous fashion.'' And he got up and to hear her.', 'Beatae omnis omnis eveniet nesciunt animi ipsum in.', '1975-06-19', '11:14:34', '2018-12-27 03:38:52', '2018-12-27 03:38:52');
INSERT INTO historials VALUES (5, 'How I wonder what you''re doing!'' cried Alice, quite forgetting her promise. ''Treacle,'' said a whiting before.'' ''I can tell you what year it is?'' ''Of course it was,'' said the Cat, ''a dog''s not mad.', 'Omnis sed non tempore.', '2010-10-06', '12:00:51', '2018-12-27 03:38:52', '2018-12-27 03:38:52');


INSERT INTO hotels VALUES (1, 'Schinner', '(877) 722-1494', 'Greenholt-Lebsack', 4, 'I vote the young Crab, a little worried. ''Just about as curious as it turned a corner, ''Oh my ears and whiskers, how late it''s getting!'' She was moving them about as she could. ''The game''s going on.', '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO hotels VALUES (2, 'Davis', '888.999.6164', 'Moen, Boehm and Dickinson', 3, 'Dodo. Then they all cheered. Alice thought to herself, ''to be going messages for a few yards off. The Cat seemed to be a very curious to know your history, you know,'' said the King, ''and don''t be.', '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO hotels VALUES (3, 'Lang', '(888) 387-7935', 'Kulas-Bednar', 5, 'King, with an M, such as mouse-traps, and the game was going to remark myself.'' ''Have you seen the Mock Turtle drew a long breath, and said anxiously to herself, as usual. ''Come, there''s half my.', '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO hotels VALUES (4, 'Jerde', '(800) 904-3613', 'Wunsch-Swaniawski', 2, 'SIT down,'' the King very decidedly, and he says it''s so useful, it''s worth a hundred pounds! He says it kills all the players, except the Lizard, who seemed too much of it at all. However.', '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO hotels VALUES (5, 'Lockman', '877.906.7540', 'Blanda LLC', 1, 'VERY good opportunity for showing off a head could be NO mistake about it: it was an old Turtle--we used to come yet, please your Majesty,'' he began, ''for bringing these in: but I THINK I can find.', '2018-12-27 03:38:51', '2018-12-27 03:38:51');


INSERT INTO lugars VALUES (1, 'Comoros', 'Mullerberg', '197 Clara Bypass Suite 427
Rickyside, TX 71138-4906', '50938', '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO lugars VALUES (2, 'Barbados', 'Kohlerchester', '98189 Aditya Manor
Elyssaburgh, MN 40585-2228', '53662', '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO lugars VALUES (3, 'Uruguay', 'Rhettfurt', '7692 Malachi Plain
Mantemouth, RI 07281', '17939-3100', '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO lugars VALUES (4, 'Korea', 'Maudieberg', '5120 Padberg Courts
East Caterina, NC 97546-3549', '70319', '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO lugars VALUES (5, 'Thailand', 'Myrnaburgh', '3421 Olaf Loaf
East Lilafort, AK 56398-5481', '95213', '2018-12-27 03:38:50', '2018-12-27 03:38:50');


INSERT INTO paquete_actividads VALUES (1, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 41, 2);
INSERT INTO paquete_actividads VALUES (2, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 42, 1);
INSERT INTO paquete_actividads VALUES (3, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 43, 1);
INSERT INTO paquete_actividads VALUES (4, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 44, 1);
INSERT INTO paquete_actividads VALUES (5, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 45, 2);


INSERT INTO paquete_habitacions VALUES (1, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 101, 46);
INSERT INTO paquete_habitacions VALUES (2, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 102, 82);
INSERT INTO paquete_habitacions VALUES (3, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 103, 63);
INSERT INTO paquete_habitacions VALUES (4, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 104, 85);
INSERT INTO paquete_habitacions VALUES (5, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 105, 44);


INSERT INTO paquete_traslados VALUES (1, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 81, 14);
INSERT INTO paquete_traslados VALUES (2, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 82, 12);
INSERT INTO paquete_traslados VALUES (3, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 83, 17);
INSERT INTO paquete_traslados VALUES (4, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 84, 18);
INSERT INTO paquete_traslados VALUES (5, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 85, 1);



INSERT INTO paquete_vehiculos VALUES (1, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 61, 10);
INSERT INTO paquete_vehiculos VALUES (2, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 62, 41);
INSERT INTO paquete_vehiculos VALUES (3, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 63, 22);
INSERT INTO paquete_vehiculos VALUES (4, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 64, 17);
INSERT INTO paquete_vehiculos VALUES (5, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 65, 32);


INSERT INTO paquete_vuelos VALUES (1, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 121, 16);
INSERT INTO paquete_vuelos VALUES (2, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 122, 12);
INSERT INTO paquete_vuelos VALUES (3, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 123, 39);
INSERT INTO paquete_vuelos VALUES (4, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 124, 43);
INSERT INTO paquete_vuelos VALUES (5, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 125, 21);


INSERT INTO paquetes VALUES (1, 697.30, 'Alice as she spoke. Alice did not quite sure whether it would not stoop? Soup of the door and found quite a long breath, and said ''No, never'') ''--so you can have no sort of use in crying like that!''.', 663.00, '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO paquetes VALUES (2, 732.10, 'Mouse''s tail; ''but why do you want to go down the chimney?--Nay, I shan''t! YOU do it!--That I won''t, then!--Bill''s to go down--Here, Bill! the master says you''re to go down the chimney?--Nay, I.', 551.90, '2018-12-27 03:38:52', '2018-12-27 03:38:52');
INSERT INTO paquetes VALUES (3, 466.60, 'As she said to herself, ''I wonder if I''ve kept her eyes immediately met those of a large kitchen, which was a bright idea came into her head. ''If I eat or drink something or other; but the three.', 857.30, '2018-12-27 03:38:52', '2018-12-27 03:38:52');
INSERT INTO paquetes VALUES (4, 19.40, 'Where CAN I have none, Why, I haven''t been invited yet.'' ''You''ll see me there,'' said the Lory. Alice replied very readily: ''but that''s because it stays the same when I was thinking I should like to.', 798.60, '2018-12-27 03:38:52', '2018-12-27 03:38:52');
INSERT INTO paquetes VALUES (5, 182.60, 'Alice; ''but a grin without a grin,'' thought Alice; ''I might as well she might, what a dear quiet thing,'' Alice went on all the jelly-fish out of the pack, she could not make out at the sudden.', 136.80, '2018-12-27 03:38:52', '2018-12-27 03:38:52');


INSERT INTO permisos VALUES (1, 'Sin acceso', 'Usuario no tiene permiso indicado', 1, '2018-12-27 03:38:49', '2018-12-27 03:38:49');
INSERT INTO permisos VALUES (2, 'Solo lectura', 'Usuario solo puede ver área indicada', 2, '2018-12-27 03:38:49', '2018-12-27 03:38:49');
INSERT INTO permisos VALUES (3, 'Lectura y compra', 'Usuario puede ver área indicada y comprar', 3, '2018-12-27 03:38:49', '2018-12-27 03:38:49');
INSERT INTO permisos VALUES (4, 'Lectura, compra y obtención de puntos', 'Usuario puede ver área indicada, comprar y obener puntos', 4, '2018-12-27 03:38:49', '2018-12-27 03:38:49');
INSERT INTO permisos VALUES (5, 'Actualizar, eliminar y crear', 'Usuario puede eliminar una tupla en la BD', 5, '2018-12-27 03:38:49', '2018-12-27 03:38:49');


INSERT INTO reserva_paquetes VALUES (1, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 2, 21);
INSERT INTO reserva_paquetes VALUES (2, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 1, 22);
INSERT INTO reserva_paquetes VALUES (3, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 8, 23);
INSERT INTO reserva_paquetes VALUES (4, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 5, 24);
INSERT INTO reserva_paquetes VALUES (5, '2018-12-27 03:38:52', '2018-12-27 03:38:52', 6, 25);


INSERT INTO reservas VALUES (1, '2018-12-27', '03:38:50', 'sin datos', 1, '2018-12-27 03:38:50', '2018-12-27 03:38:50', NULL);
INSERT INTO reservas VALUES (2, '2018-12-27', '03:38:50', 'sin datos', 1, '2018-12-27 03:38:50', '2018-12-27 03:38:50', NULL);
INSERT INTO reservas VALUES (3, '2018-12-27', '03:38:51', 'sin datos', 1, '2018-12-27 03:38:51', '2018-12-27 03:38:51', NULL);
INSERT INTO reservas VALUES (4, '2018-12-27', '03:38:51', 'sin datos', 1, '2018-12-27 03:38:51', '2018-12-27 03:38:51', NULL);
INSERT INTO reservas VALUES (5, '2018-12-27', '03:38:51', 'sin datos', 1, '2018-12-27 03:38:51', '2018-12-27 03:38:51', NULL);

INSERT INTO rol_permisos VALUES (1, '2018-12-27 03:38:49', '2018-12-27 03:38:49', 1, 5);
INSERT INTO rol_permisos VALUES (2, '2018-12-27 03:38:49', '2018-12-27 03:38:49', 2, 4);
INSERT INTO rol_permisos VALUES (3, '2018-12-27 03:38:49', '2018-12-27 03:38:49', 3, 3);


INSERT INTO rols VALUES (1, 'admin', 'Administrador', '2018-12-27 03:38:49', '2018-12-27 03:38:49');
INSERT INTO rols VALUES (2, 'cliente', 'Cliente que puede obtener puntos', '2018-12-27 03:38:49', '2018-12-27 03:38:49');
INSERT INTO rols VALUES (3, 'usuario', 'Usuario', '2018-12-27 03:38:49', '2018-12-27 03:38:49');


INSERT INTO seguros VALUES (1, 'Accidentes personales', 'Seguro de muerte accidental, desmembramiento en transporte común', 250.00, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO seguros VALUES (2, 'Médicos y dentales', 'Emergencia médica, gastos odontológicos, medicamentos recetados, traslado médico, repatriación de restos, viaje de emergencia, gastos de hotel por hospitalización, recuperación médica en hotel, compañero de viaje menor de edad.', 150.00, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO seguros VALUES (3, 'Cancelación y cambio de viaje', 'Retraso de viaje, cancelación de viaje, interrupción de viaje', 50.00, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO seguros VALUES (4, 'Equipaje y propiedad personal', 'Pérdida de equipaje, retraso de equipaje, daño de equipaje, localización
        y seguimiento de equipaje, pérdida o daño a los documentos de viaje', 100.00, '2018-12-27 03:38:50', '2018-12-27 03:38:50');


INSERT INTO traslados VALUES (1, 537.40, 2, 'Heathcote and Sons', '2020-12-17', '3575 McKenzie Via Apt. 106
Blancafurt, UT 86089-7028', 2, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 5);
INSERT INTO traslados VALUES (2, 242.70, 1, 'Kertzmann Group', '2019-10-13', '942 Fritz Squares
North Reidton, TX 05639-6456', 2, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 13);
INSERT INTO traslados VALUES (3, 867.50, 10, 'Pagac Group', '2020-04-02', '407 Dickens Views
Idahaven, IL 57180-7849', 3, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 3);
INSERT INTO traslados VALUES (4, 556.80, 4, 'Ondricka LLC', '2019-09-26', '2383 Bartell Grove
Jaylenville, AR 81864-0834', 1, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 9);
INSERT INTO traslados VALUES (5, 810.80, 3, 'Christiansen Ltd', '2020-04-12', '41395 Walker Manors Apt. 147
South Milton, TN 44077-1308', 1, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 4);

INSERT INTO users VALUES (1, 'User', 'User', 'User', 'User', 'user@user.user', '2016-01-01', 1234, 'santiago', 'cale falsa 1234', 'santiago', NULL, '$2y$10$eqis6J2Myz4NxLdehRrQluGOo3SwZI.yECBBmzK4HNbwYHwf//z7q', '+56-999999999', 1, 1, 0, NULL, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO users VALUES (2, 'Admin', 'Admin', 'Admin', 'Admin', 'admin@admin.admin', '2016-01-01', 123, 'santiago', 'cale falsa 12345', 'santiago', NULL, '$2y$10$du2BhC.rBan0vZ6W1j2EcuyPtGswrXpOrvgL0HTm9yeemBVowjCji', '+56-898989898', 1, 1, 0, NULL, '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO users VALUES (3, 'Casandra', 'Morton', 'O''Reilly', 'Crooks', 'xeffertz@example.com', '1985-07-14', 41, 'Florineland', '93917 Jerome Run
McClureberg, UT 03361-2291', 'Philippines', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '+13938594735', 1, 2, 1, '7rFHNc2QEWDf0SD6tIli', '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO users VALUES (4, 'Haleigh', 'Julia', 'Grant', 'Stokes', 'andreanne68@example.com', '1980-12-11', 43, 'Simeonport', '53415 Mireya Circle
Randallville, IA 68402-9730', 'United Kingdom', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '648-773-6281 x41520', 2, 2, 2, 'AlgLt75ElgpdFSCdvAl1', '2018-12-27 03:38:50', '2018-12-27 03:38:50');
INSERT INTO users VALUES (5, 'Emelie', 'Luciano', 'Hyatt', 'Auer', 'elroy.krajcik@example.org', '2016-07-07', 45, 'Maximochester', '367 O''Keefe Neck Apt. 491
Andreside, NC 89812', 'Jersey', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '1-515-612-0166 x160', 2, 1, 1, 'vjdi1mCNOI1c3RX5VqrE', '2018-12-27 03:38:50', '2018-12-27 03:38:50');


INSERT INTO usuario_rols VALUES (1, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 1, 3);
INSERT INTO usuario_rols VALUES (2, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 2, 1);
INSERT INTO usuario_rols VALUES (3, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 3, 1);
INSERT INTO usuario_rols VALUES (4, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 4, 2);
INSERT INTO usuario_rols VALUES (5, '2018-12-27 03:38:50', '2018-12-27 03:38:50', 5, 3);


INSERT INTO vehiculos VALUES (1, '2019-04-10', '2019-01-16', 'Bernhard-Oberbrunner', 594.40, 'Abbott Ports', 5, true, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 20);
INSERT INTO vehiculos VALUES (2, '2020-12-13', '2019-12-02', 'Bergstrom, Murazik and Brekke', 179.70, 'Johanna Skyway', 10, false, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 4);
INSERT INTO vehiculos VALUES (3, '2019-06-12', '2020-08-24', 'Erdman and Sons', 768.30, 'Welch Way', 10, true, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 11);
INSERT INTO vehiculos VALUES (4, '2019-10-23', '2019-06-01', 'Homenick Inc', 128.50, 'Ocie Lakes', 10, false, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 2);
INSERT INTO vehiculos VALUES (5, '2019-07-02', '2019-08-04', 'Carroll Ltd', 593.90, 'Bernier Springs', 2, true, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 5);


INSERT INTO vuelo_asientos VALUES (1, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 1, 22);
INSERT INTO vuelo_asientos VALUES (2, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 2, 23);
INSERT INTO vuelo_asientos VALUES (3, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 3, 6);
INSERT INTO vuelo_asientos VALUES (4, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 4, 20);
INSERT INTO vuelo_asientos VALUES (5, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 5, 12);


INSERT INTO vuelo_escalas VALUES (1, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 41, 11);
INSERT INTO vuelo_escalas VALUES (2, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 42, 11);
INSERT INTO vuelo_escalas VALUES (3, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 43, 11);
INSERT INTO vuelo_escalas VALUES (4, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 44, 4);
INSERT INTO vuelo_escalas VALUES (5, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 45, 16);


INSERT INTO vuelo_seguros VALUES (1, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 21, 3);
INSERT INTO vuelo_seguros VALUES (2, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 22, 4);
INSERT INTO vuelo_seguros VALUES (3, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 23, 1);
INSERT INTO vuelo_seguros VALUES (4, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 24, 2);
INSERT INTO vuelo_seguros VALUES (5, '2018-12-27 03:38:51', '2018-12-27 03:38:51', 25, 1);


INSERT INTO vuelos VALUES (1, '2020-03-28', '2019-09-22', '00:16:48', '09:11:11', 901.50, 256.40, 16, false, 1, false, 'Gislason Ltd', 6, 16, '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO vuelos VALUES (2, '2020-04-27', '2020-12-07', '09:15:45', '04:57:15', 690.90, 292.60, 2, true, 2, true, 'Nienow, Huels and Gutmann', 16, 5, '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO vuelos VALUES (3, '2020-10-30', '2019-07-15', '13:07:50', '21:21:31', 197.20, 165.60, 20, true, 3, true, 'Treutel, Kuhn and Bergnaum', 2, 4, '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO vuelos VALUES (4, '2020-07-10', '2019-07-12', '02:31:55', '01:21:08', 79.60, 528.50, 29, true, 5, false, 'Rogahn, Crooks and Schiller', 19, 17, '2018-12-27 03:38:51', '2018-12-27 03:38:51');
INSERT INTO vuelos VALUES (5, '2020-02-05', '2019-04-30', '13:03:56', '14:14:56', 61.50, 811.20, 7, false, 3, true, 'Pollich Ltd', 9, 20, '2018-12-27 03:38:51', '2018-12-27 03:38:51');