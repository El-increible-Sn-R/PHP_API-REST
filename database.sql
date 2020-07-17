
create table t_usuario(
	usuario_id int not null AUTO_INCREMENT primary key,
	usuario_nombre varchar(255) not null,
	usuario_apellido varchar(255) not null,
	usuario_telefono int not null,
	usuario_contrasenia varchar(255) not null,
	usuario_login varchar(255) not null,
	usuario_imagen varchar(255) null,
	usuario_tipo char(1) not null check (usuario_tipo in ('s','a','e'))
)ENGINE=InnoDb;

create table t_empresa(
	empresa_id int not null AUTO_INCREMENT primary key,
	empresa_nombre varchar(255) not null,
	empresa_estaBorrado char(1) default 'n' not null check (empresa_estaBorrado in ('b','n')),
	empresa_pais varchar(255) not null,
	empresa_region varchar(255) not null,
	empresa_comuna varchar(255) not null, 
	usuario_id int not null,
    
	constraint fk_usuario_empresa foreign key (usuario_id) references t_usuario (usuario_id)
)ENGINE=InnoDb;

create table t_local(
	local_id int not null AUTO_INCREMENT primary key,
	local_nombre varchar(255) not null,
	local_descripcion varchar(255) not null,
	empresa_id int not null,
	local_email varchar(255) not null,
	local_telefono varchar(255) not null,
	local_pais varchar(255) not null,
	local_region varchar(255) not null,
	local_comuna varchar(255) not null, 
	local_direccion varchar(255) not null, 
	usuario_id int not null,
	local_nDiasDeReserva int not null,
	local_estaBorrado char(1) default 'n' null check (local_estaBorrado in ('b','n')),
    
	constraint fk_usuario_local foreign key (usuario_id) references t_usuario (usuario_id),
	constraint fk_empresa_local foreign key (empresa_id) references t_empresa (empresa_id)
)ENGINE=InnoDb;

create table t_galeria(
	galeria_id int not null AUTO_INCREMENT primary key,
	galeria_coleccion_orden varchar(255) not null,
	local_id int not null,

	constraint fk_local_galeria foreign key (local_id) references t_local (local_id)
)ENGINE=InnoDb;

create table t_grupoCaracteriticas(
	grupo_id int not null AUTO_INCREMENT primary key,
	grupo_nombre varchar(255) not null	
)ENGINE=InnoDb;

create table t_caracteristicasLocal(
	caracteristicasLocal_id int not null AUTO_INCREMENT primary key,
	caracteristicasLocal_nombre varchar(255) not null,
	grupo_id int not null,
    
	constraint fk_grupoCaracteristicas_caracteristicasLocal foreign key (grupo_id) references t_grupoCaracteriticas (grupo_id)
)ENGINE=InnoDb;

create table t_localCaracteristicas(
	localCaracteristicas_id int not null AUTO_INCREMENT primary key,
	local_id int not null,
	caracteristicasLocal_id int not null,
    
	constraint fk_local_localCaracteriticas foreign key (local_id) references t_local (local_id),
	constraint fk_caracteriticasLocal_localCaracteriticas foreign key (caracteristicasLocal_id) references t_caracteristicasLocal (caracteristicasLocal_id)	
)ENGINE=InnoDb;

create table t_unidad(
	unidad_id int not null AUTO_INCREMENT primary key,
	unidad_precioMensual int not null,
	unidad_area int not null,
	unidad_oferta varchar(255) not null,
	local_id int not null,
	unidad_estaBorrado char(1) default 'n' not null check (unidad_estaBorrado in ('b','n')),
	unidad_estaDisponible char(1) default 'd' not null check (unidad_estaDisponible in ('d','n')),

	constraint fk_local_unidad foreign key (local_id) references t_local (local_id)
)ENGINE=InnoDb;

create table t_caracteristicasUnidad(
	caracteristicasUnidad_id int not null AUTO_INCREMENT primary key,
	caracteristicasUnidad_nombre varchar(255) not null
)ENGINE=InnoDb;

create table t_unidadCaracteristicas(
	unidadCaracteristicas_id int not null AUTO_INCREMENT primary key,
	unidad_id int not null,
	caracteristicasUnidad_id int not null,
    
	constraint fk_unidad_unidadCaracteristicas foreign key (unidad_id) references t_unidad (unidad_id),
	constraint fk_caracteristicasUnidad_unidadCaracteristicas foreign key (caracteristicasUnidad_id) references t_caracteristicasUnidad (caracteristicasUnidad_id)
)ENGINE=InnoDb;

create table t_unidadReserva(
	unidadReserva_id int not null AUTO_INCREMENT primary key,
	unidad_id int not null,
	reserva_id int not null,

	constraint fk_unidad_unidadReserva foreign key (unidad_id) references t_unidad (unidad_id),
	constraint fk_unidadReserva_unidadReserva foreign key (reserva_id) references t_reserva (reserva_id)
)ENGINE=InnoDb;

create table t_visitas(
	visitas_id int not null AUTO_INCREMENT primary key,
	visitas_ip varchar(255) not null,
	visitas_fecha date not null,
	visitas_hora time not null,
	local_id int not null,

	constraint fk_local_visitas foreign key (local_id) references t_local (local_id)
)ENGINE=InnoDb;

create table t_horario(
	horario_id int not null AUTO_INCREMENT primary key,
	horario_horaEntrada time not null,
	horario_horaSalida time not null,
	horario_tipo char(1) not null,
	local_id int not null,
	horario_dia varchar(255) not null,

	constraint fk_local_horario foreign key (local_id) references t_local (local_id)
)ENGINE=InnoDb;

create table t_reservas(
	reserva_id int not null AUTO_INCREMENT primary key,
	reserva_nombre varchar(255) not null,
	reserva_apellido varchar(255) not null,
	reserva_email varchar(255) not null,
	reserva_telefono int not null,
	reserva_fechaRegistro TIMESTAMP  default CURRENT_TIMESTAMP not null,
	reserva_fechaMudanza TIMESTAMP  default CURRENT_TIMESTAMP null,
	reserva_estado char(1) default 'o' null check (reserva_estado in ('o','g','p'))
)ENGINE=InnoDb;

insert into t_usuarios(usuario_nombre,usuario_apellido,usuario_telefono,usuario_contrasenia,usuario_login,usuario_tipo) 
values ('marcos','aguilar',111111111,'contrasenia','marcos','s');

insert into t_grupo_de_caracteristicas values (null,'pagos');

insert into t_caracteriticas_de_unidades values (null,'Primer piso');

insert into t_caracteriticas_de_locales values (null,'Acepta Tarjeta De Crédito',1);

insert into t_empresas (empresa_nombre,empresa_pais,empresa_region,empresa_provincia,empresa_comuna) 
values ('Super bodegas','Perú','Arequipa','Arequipa','miraflores');

insert into t_locales (local_nombre,local_descripcion,empresa_id,local_email,local_telefono,local_pais,local_region,local_provincia,local_comuna,local_direccion,local_latitud,local_longitud,local_nDiasDeReserva) 
values ('Peke Bodega','Peke Bodega le ofrece bodegas para guardar sus cosas por el tiempo que deseé',1,'emailDelLocal@algo.algo',111111111,'Perú','Arequipa','Arequipa','Alto Selva Alegre','Argentina 126, Arequipa 04004, Perú',-16.382547,-71.519298,20);

insert into t_pivot_administracion values (null,1,1,1);

insert into t_galeria values (null,'http://amdigital.tech/static/imagenes/1j.jpeg',1);

insert into t_pivot_local_caracteriticas values (null,1,1);

insert into t_unidades(unidad_precioMensual,unidad_area,unidad_oferta,local_id) 
values (70,5,'oferton de la unidad 1',2);

insert into t_pivot_caracteriticas_unidad values (null,1,1);	

insert into t_reservas values 
(null,'Niko','Bellic','nikoBellic@gmail.com',11111111,CURTIME(),'2020-02-06',default,default,2,'Q2OOLS5Z','281bd29a44e3da06e769ad79694a53f1');

insert into t_horario values
(null,'08:00','19:00','o',1,'lunes');


----------------------------------------------AQUI EMPEZAMOS--------------------------
create table ventas(
	ventas_id BIGINT not null AUTO_INCREMENT primary key,
	ventas_nroPedido BIGINT not null,
	ventas_cliente_nombre varchar(255) not null,
	ventas_moneda char(3) not null,
	ventas_importe decimal(10,2) not null,
	ventas_marca varchar(16) not null,
	ventas_fechatransaccion TIMESTAMP default CURRENT_TIMESTAMP,
	ventas_fechaliquidacion DATETIME null,
	ventas_estado char(1) default 'p' null check (ventas_estado in ('d','l','a','p')),
	ventas_codigo_comercio int not null,
	ventas_idtransaccion_visanet BIGINT not null UNIQUE,
	ventas_cliente_email varchar(255) not null,
	ventas_codigo_accion char(3) not null,
	ventas_motivo_denegacion varchar(255) null,
	ventas_fechaanulacion DATETIME null,
	ventas_nombre_comercio varchar(255) not null,
	ventas_cliente_documento int not null,
	ventas_cliente_tarjeta varchar(255) not null,
	ventas_codigo_autorizacion MEDIUMINT not null,
	ventas_codigo_eci TINYINT not null,
	ventas_canal varchar(255) not null
	
)ENGINE=InnoDb;

insert into ventas values 
(null,320,'Nico Bellic','PEN',12.35,'visannnnnnnnnnn',default,null,default,341198210,990172014359425,'nikoBellic@gmail.com','000','motivo de denegacion',null,'cromotex',77884865,'457033******4330',170921,07,'web');
insert into ventas values 
(null,914320,'Maria Miranda','Pen',700.00,'visa',default,null,default,341198210,777172014359425,'algo.algo@gmail.com','00','motivo de denegacion',null,'cromotex',81524115,'457033******5589',170921,07,'web');
insert into ventas values 
(null,9320,'Maria Miranda','Pen',10000000.00,'visa',default,null,default,341198210,888172014359425,'algo.algo@gmail.com','000','motivo de denegacion',null,'cromotex',81524115,'457033******5589',170921,07,'web');
---------------------------------------------------------------------------------------
--DECIMAL: Precisión hasta 8 valores enteros con 2 decimales-->70000011.00(10,2)
--CHAR(3): Cuardas 3 caracteres o menos, pero no mas (si guardas 000 se toma como 0, guarda '000' asi si) 
--varchar(16): 16 caracteres o menos, con mas cae

-----------ventas_fechatransaccion: 
--proviene del "transactionDate" es la fecha en la que se hizo la compra 

-----------ventas_fechaliquidacion:
--fecha en la que el usuario administrador cambio el estado a "liquidado" en un primer
--momento ouede ser nulo

-----------ventas_estado
--denegado,liquidado,anulado,por liquidar 

-----------ventas_codigo_comercio (DataMap/MERCHANT:string,minLength: 9,maxLength: 9)
--Código de comercio VisaNet al cual pertenece la transacción

-----------ventas_idtransaccion_visanet(OrderRS/transactionId:string,minLength: 15,maxLength: 15)
--es el id de la venta/transaccion con el que se registro en visanet diferente a ventas_id 
--porque ese valor es nuestro y empezara desde 1

-----------ventas_codigo_accion(OrderRS/string,minLength: 3,maxLength: 3)
--Código que identifica la acción a tomar o tomada, así como la razón de la misma. 
--Define la respuesta a la petición de autorización realizada

-----------ventas_motivo_denegacion(DataMap/ACTION_DESCRIPTION:string,minLength: 1,maxLength: 100)
--explica poque se denego o la transaccion

-----------ventas_fechaanulacion
--la fecha en la que se anulo la transaccion

-----------ventas_nombre_comercio
--se repetira en todos los casos porque simepre sera "cromotex"

-----------ventas_cliente_tarjeta(DataMap/CARD:string,minLength: 14,maxLength: 16)
--Número de tarjeta enmascarado usada en la venta

-----------ventas_codigo_autorizacion(OrderRS/authorizationCode:string,minLength: 1,maxLength: 6)
--Código de autorización asignado a la aprobación de la transacción por la entidad resolutora

-----------ventas_codigo_eci(DataMap/ECI:string,minLength: 2,maxLength: 2)
--Código ECI asociado a la autenticación de la transacción