------------------LO QUE SE HACE---------------------
DROP TRIGGER IF EXISTS `bitacora_inscripcion_insertar`;
CREATE TRIGGER `bitacora_inscripcion_insertar` AFTER INSERT ON `inscripcion` FOR EACH ROW INSERT INTO 
bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),
SUBSTRING(USER(),1,(instr(user(),'@')-1)),"inscripcion", "Insertó_Diplomante",NOW());


DROP TRIGGER IF EXISTS `bit_inscripcion_actualizar`;

DROP TRIGGER IF EXISTS `bit_inscripcion_actualizar_bu`;
CREATE TRIGGER `bit_inscripcion_actualizar_bu` BEFORE UPDATE ON `inscripcion` FOR EACH ROW INSERT INTO 
bit_inscripcion_actualizacion(idBit_inscripcion, ci_bit, ant_numI, ant_sexo, ant_pais, ant_departamento, ant_fechanac, ant_estadocivil, ant_direccion, ant_telefono, ant_email, nuev_numI, nuev_sexo, nuev_pais, nuev_departamento, nuev_fechanac, nuev_estadocivil, nuev_direccion, nuev_telefono, nuev_email, usuario, fecha_modI) VALUES
(OLD.idInscripcion, OLD.ciI, OLD.numeroI, OLD.sexoI, OLD.paisnacI, OLD.departamentonacI, OLD.fechanacI, OLD.estadoCivilI, OLD.direccionI, OLD.telefonoI, OLD.emailI, NEW.numeroI, NEW.sexoI, NEW.paisnacI, NEW.departamentonacI, NEW.fechanacI, NEW.estadoCivilI,NEW.direccionI, NEW.telefonoI, NEW.emailI, SUBSTRING(USER(),1,(instr(user(),'@')-1)),NOW());


DROP TRIGGER IF EXISTS `bit_inscripcion_eliminar`;
CREATE TRIGGER `bit_inscripcion_eliminar` AFTER DELETE ON `inscripcion` FOR EACH ROW INSERT INTO 
bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),
SUBSTRING(USER(),1,(instr(user(),'@')-1)),"inscripcion", "Eliminó_Inscripción",NOW());


DROP TRIGGER IF EXISTS `bitacora_nota_insertar`;
CREATE TRIGGER `bitacora_nota_insertar` AFTER INSERT ON `asignacion_modulo_diplomante` FOR EACH ROW INSERT INTO 
bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),
SUBSTRING(USER(),1,(instr(user(),'@')-1)),"Calificacion_Diplomante", "Insertó_nota",NOW());

DROP TRIGGER IF EXISTS `bit_nota_actualizar`;

DROP TRIGGER IF EXISTS `bit_actualiza_nota_bu`;
CREATE TRIGGER `bit_actualiza_nota_bu` BEFORE UPDATE ON `asignacion_modulo_diplomante` FOR EACH ROW INSERT INTO 
bit_asignacion_modiplo 
(idBit_amd,idinscripcion_bamd,idmodulo_bamd,anterior_paralelo,anterior_nota,anterior_establecen,nuevo_paralelo,nueva_nota,nueva_establecen,usuario,fecha_modif)
VALUES
(OLD.idAsignacionMDI,OLD.idInscripcion,OLD.idModulo,OLD.idParalelo,OLD.nota,OLD.establece_nota,NEW.idParalelo,NEW.nota,NEW.establece_nota,
SUBSTRING(USER(),1,(instr(user(),'@')-1)),NOW());

DROP TRIGGER IF EXISTS `bit_nota_eliminar`;
CREATE TRIGGER `bit_nota_eliminar` AFTER DELETE ON `asignacion_modulo_diplomante` FOR EACH ROW INSERT INTO 
bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),
SUBSTRING(USER(),1,(instr(user(),'@')-1)),"Calificacion_Diplomante", "Eliminó_nota",NOW());

show triggers;

iF OLD.nota != NULL AND OLD.establece_nota != NULL THEN --en el if

---------------------LA COPIA ANTERIOR---------------------------
DROP TRIGGER IF EXISTS
    `bitacora_inscripcion_insertar`;
CREATE TRIGGER `bitacora_inscripcion_insertar` AFTER INSERT ON
    `inscripcion` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "inscripcion", "Insertó_Diplomante", NOW());
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_actualizar`;
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_actualizar_bu`;
    CREATE TRIGGER `bit_inscripcion_actualizar_bu` BEFORE UPDATE
ON
    `inscripcion` FOR EACH ROW
INSERT INTO bit_inscripcion_actualizacion(
    idBit_inscripcion,
    ci_bit,
    ant_numI,
    ant_sexo,
    ant_pais,
    ant_departamento,
    ant_fechanac,
    ant_estadocivil,
    ant_direccion,
    ant_telefono,
    ant_email,
    nuev_numI,
    nuev_sexo,
    nuev_pais,
    nuev_departamento,
    nuev_fechanac,
    nuev_estadocivil,
    nuev_direccion,
    nuev_telefono,
    nuev_email,
    usuario,
    fecha_modI
)
VALUES(
    OLD.idInscripcion,
    OLD.ciI,
    OLD.numeroI,
    OLD.sexoI,
    OLD.paisnacI,
    OLD.departamentonacI,
    OLD.fechanacI,
    OLD.estadoCivilI,
    OLD.direccionI,
    OLD.telefonoI,
    OLD.emailI,
    NEW.numeroI,
    NEW.sexoI,
    NEW.paisnacI,
    NEW.departamentonacI,
    NEW.fechanacI,
    NEW.estadoCivilI,
    NEW.direccionI,
    NEW.telefonoI,
    NEW.emailI,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW());
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_eliminar`;
    CREATE TRIGGER `bit_inscripcion_eliminar` AFTER DELETE
ON
    `inscripcion` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "inscripcion", "Eliminó_Inscripción", NOW());
    DROP TRIGGER IF EXISTS
        `bitacora_nota_insertar`;
    CREATE TRIGGER `bitacora_nota_insertar` AFTER INSERT ON
        `asignacion_modulo_diplomante` FOR EACH ROW
    INSERT INTO bitacora(
        ip,
        usuario,
        nombreTabla,
        operacion,
        fecha
    )
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "Calificacion_Diplomante", "Insertó_nota", NOW());
    DROP TRIGGER IF EXISTS
        `bit_nota_actualizar`;
    DROP TRIGGER IF EXISTS
        `bit_actualiza_nota_bu`;
    DELIMITER
        $$
    CREATE TRIGGER `bit_actualiza_nota_bu` BEFORE UPDATE
ON
    `asignacion_modulo_diplomante` FOR EACH ROW
BEGIN
        IF OLD.nota IS NULL THEN
    INSERT INTO bit_asignacion_modiplo(
        idBit_amd,
        idinscripcion_bamd,
        idmodulo_bamd,
        anterior_paralelo,
        anterior_nota,
        anterior_establecen,
        nuevo_paralelo,
        nueva_nota,
        nueva_establecen,
        usuario,
        fecha_modif
    )
VALUES(
    OLD.idAsignacionMDI,
    OLD.idInscripcion,
    OLD.idModulo,
    OLD.idParalelo,
    0,
    "Sin Nota",
    NEW.idParalelo,
    NEW.nota,
    NEW.establece_nota,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ; ELSE
    INSERT INTO bit_asignacion_modiplo(
        idBit_amd,
        idinscripcion_bamd,
        idmodulo_bamd,
        anterior_paralelo,
        anterior_nota,
        anterior_establecen,
        nuevo_paralelo,
        nueva_nota,
        nueva_establecen,
        usuario,
        fecha_modif
    )
VALUES(
    OLD.idAsignacionMDI,
    OLD.idInscripcion,
    OLD.idModulo,
    OLD.idParalelo,
    OLD.nota,
    OLD.establece_nota,
    NEW.idParalelo,
    NEW.nota,
    NEW.establece_nota,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ;
        END IF ;
    END $$
DELIMITER
    ;
DROP TRIGGER IF EXISTS
    `bit_nota_eliminar`;
CREATE TRIGGER `bit_nota_eliminar` AFTER DELETE
ON
    `asignacion_modulo_diplomante` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "Calificacion_Diplomante", "Eliminó_nota", NOW());

---------------penultimo copiado--------------------
DROP TRIGGER IF EXISTS
    `bitacora_inscripcion_insertar`;
CREATE TRIGGER `bitacora_inscripcion_insertar` AFTER INSERT ON
    `inscripcion` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "inscripcion", "Insertó_Diplomante", NOW());
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_actualizar`;
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_actualizar_bu`;
    CREATE TRIGGER `bit_inscripcion_actualizar_bu` BEFORE UPDATE
ON
    `inscripcion` FOR EACH ROW
INSERT INTO bit_inscripcion_actualizacion(
    idBit_inscripcion,
    ci_bit,
    ant_numI,
    ant_sexo,
    ant_pais,
    ant_departamento,
    ant_fechanac,
    ant_estadocivil,
    ant_direccion,
    ant_telefono,
    ant_email,
    nuev_numI,
    nuev_sexo,
    nuev_pais,
    nuev_departamento,
    nuev_fechanac,
    nuev_estadocivil,
    nuev_direccion,
    nuev_telefono,
    nuev_email,
    usuario,
    fecha_modI
)
VALUES(
    OLD.idInscripcion,
    OLD.ciI,
    OLD.numeroI,
    OLD.sexoI,
    OLD.paisnacI,
    OLD.departamentonacI,
    OLD.fechanacI,
    OLD.estadoCivilI,
    OLD.direccionI,
    OLD.telefonoI,
    OLD.emailI,
    NEW.numeroI,
    NEW.sexoI,
    NEW.paisnacI,
    NEW.departamentonacI,
    NEW.fechanacI,
    NEW.estadoCivilI,
    NEW.direccionI,
    NEW.telefonoI,
    NEW.emailI,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW());
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_eliminar`;
    CREATE TRIGGER `bit_inscripcion_eliminar` AFTER DELETE
ON
    `inscripcion` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "inscripcion", "Eliminó_Inscripción", NOW());
    DROP TRIGGER IF EXISTS
        `bitacora_nota_insertar`;
    CREATE TRIGGER `bitacora_nota_insertar` AFTER INSERT ON
        `asignacion_modulo_diplomante` FOR EACH ROW
    INSERT INTO bitacora(
        ip,
        usuario,
        nombreTabla,
        operacion,
        fecha
    )
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "Calificacion_Diplomante", "Insertó_nota", NOW());
    DROP TRIGGER IF EXISTS
        `bit_nota_actualizar`;
    DROP TRIGGER IF EXISTS
        `bit_actualiza_nota_bu`;
    DELIMITER
        $$
    CREATE TRIGGER `bit_actualiza_nota_bu` AFTER UPDATE
ON
    `asignacion_modulo_diplomante` FOR EACH ROW
BEGIN
    IF NEW.nota THEN
    
        INSERT INTO bit_asignacion_modiplo(
            idBit_amd,
            idinscripcion_bamd,
            idmodulo_bamd,
            anterior_paralelo,
            anterior_nota,
            anterior_establecen,
            nueva_nota,
            nueva_establecen,
            usuario,
            fecha_modif
        )
        VALUES(
            OLD.idAsignacionMDI,
            OLD.idInscripcion,
            OLD.idModulo,
            OLD.idParalelo,
            0,
            "Sin Nota",
            0,
            NULL,
            SUBSTRING(
                USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ; 
    ELSE
        BEGIN 
            IF OLD.nota IS NULL THEN
        
            INSERT INTO bit_asignacion_modiplo(
                idBit_amd,
                idinscripcion_bamd,
                idmodulo_bamd,
                anterior_paralelo,
                anterior_nota,
                anterior_establecen,
                nueva_nota,
                nueva_establecen,
                usuario,
                fecha_modif
            )
            VALUES(
                OLD.idAsignacionMDI,
                OLD.idInscripcion,
                OLD.idModulo,
                OLD.idParalelo,
                0,
                "Sin Nota",
                NEW.nota,
                NEW.establece_nota,
                SUBSTRING(
                    USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ; 
            ELSE
            INSERT INTO bit_asignacion_modiplo(
                idBit_amd,
                idinscripcion_bamd,
                idmodulo_bamd,
                anterior_paralelo,
                anterior_nota,
                anterior_establecen,
                nueva_nota,
                nueva_establecen,
                usuario,
                fecha_modif
            )
            VALUES(
                OLD.idAsignacionMDI,
                OLD.idInscripcion,
                OLD.idModulo,
                OLD.idParalelo,
                OLD.nota,
                OLD.establece_nota,
                NEW.nota,
                NEW.establece_nota,
                SUBSTRING(
                    USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ;
            END IF ;
        END;
    END IF ;
END $$
DELIMITER
    ;
DROP TRIGGER IF EXISTS
    `bit_nota_eliminar`;
CREATE TRIGGER `bit_nota_eliminar` AFTER DELETE
ON
    `asignacion_modulo_diplomante` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "Calificacion_Diplomante", "Eliminó_nota", NOW());
    
-----------------PARA ELIMINAR LOS TRIGUERS-----------------
DROP TRIGGER IF EXISTS `bitacora_inscripcion_insertar`;
DROP TRIGGER IF EXISTS `bit_inscripcion_actualizar`;
DROP TRIGGER IF EXISTS `bit_inscripcion_actualizar_bu`;
DROP TRIGGER IF EXISTS `bit_inscripcion_eliminar`;
DROP TRIGGER IF EXISTS `bitacora_nota_insertar`;
DROP TRIGGER IF EXISTS `bit_nota_actualizar`;
DROP TRIGGER IF EXISTS `bit_actualiza_nota_bu`;
DROP TRIGGER IF EXISTS `bit_nota_eliminar`;
show triggers;

------------------LO QUE SE COPIA A MYSQL---------------------
DROP TRIGGER IF EXISTS
    `bitacora_inscripcion_insertar`;
CREATE TRIGGER `bitacora_inscripcion_insertar` AFTER INSERT ON
    `inscripcion` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "inscripcion", "Insertó_Diplomante", NOW());
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_actualizar`;
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_actualizar_bu`;
    CREATE TRIGGER `bit_inscripcion_actualizar_bu` BEFORE UPDATE
ON
    `inscripcion` FOR EACH ROW
INSERT INTO bit_inscripcion_actualizacion(
    idBit_inscripcion,
    ci_bit,
    ant_numI,
    ant_sexo,
    ant_pais,
    ant_departamento,
    ant_fechanac,
    ant_estadocivil,
    ant_direccion,
    ant_telefono,
    ant_email,
    nuev_numI,
    nuev_sexo,
    nuev_pais,
    nuev_departamento,
    nuev_fechanac,
    nuev_estadocivil,
    nuev_direccion,
    nuev_telefono,
    nuev_email,
    usuario,
    fecha_modI
)
VALUES(
    OLD.idInscripcion,
    OLD.ciI,
    OLD.numeroI,
    OLD.sexoI,
    OLD.paisnacI,
    OLD.departamentonacI,
    OLD.fechanacI,
    OLD.estadoCivilI,
    OLD.direccionI,
    OLD.telefonoI,
    OLD.emailI,
    NEW.numeroI,
    NEW.sexoI,
    NEW.paisnacI,
    NEW.departamentonacI,
    NEW.fechanacI,
    NEW.estadoCivilI,
    NEW.direccionI,
    NEW.telefonoI,
    NEW.emailI,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW());
    DROP TRIGGER IF EXISTS
        `bit_inscripcion_eliminar`;
    CREATE TRIGGER `bit_inscripcion_eliminar` AFTER DELETE
ON
    `inscripcion` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "inscripcion", "Eliminó_Inscripción", NOW());
    DROP TRIGGER IF EXISTS
        `bitacora_nota_insertar`;
    CREATE TRIGGER `bitacora_nota_insertar` AFTER INSERT ON
        `asignacion_modulo_diplomante` FOR EACH ROW
    INSERT INTO bitacora(
        ip,
        usuario,
        nombreTabla,
        operacion,
        fecha
    )
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "Calificacion_Diplomante", "Insertó_nota", NOW());
    DROP TRIGGER IF EXISTS
        `bit_nota_actualizar`;
    DROP TRIGGER IF EXISTS
        `bit_actualiza_nota_bu`;
    DELIMITER
        $$
    CREATE TRIGGER `bit_actualiza_nota_bu` AFTER UPDATE
ON
    `asignacion_modulo_diplomante` FOR EACH ROW
BEGIN
        IF OLD.nota IS NULL THEN
    INSERT INTO bit_asignacion_modiplo(
        idBit_amd,
        idinscripcion_bamd,
        idmodulo_bamd,
        anterior_paralelo,
        anterior_nota,
        anterior_establecen,
        nueva_nota,
        nueva_establecen,
        usuario,
        fecha_modif
    )
VALUES(
    OLD.idAsignacionMDI,
    OLD.idInscripcion,
    OLD.idModulo,
    OLD.idParalelo,
    0,
    "Sin Nota",
    NEW.nota,
    NEW.establece_nota,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ; ELSE
    INSERT INTO bit_asignacion_modiplo(
        idBit_amd,
        idinscripcion_bamd,
        idmodulo_bamd,
        anterior_paralelo,
        anterior_nota,
        anterior_establecen,
        nueva_nota,
        nueva_establecen,
        usuario,
        fecha_modif
    )
VALUES(
    OLD.idAsignacionMDI,
    OLD.idInscripcion,
    OLD.idModulo,
    OLD.idParalelo,
    OLD.nota,
    OLD.establece_nota,
    NEW.nota,
    NEW.establece_nota,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ;
        END IF ;
    END $$
DELIMITER
    ;
DROP TRIGGER IF EXISTS
    `bit_nota_eliminar`;
CREATE TRIGGER `bit_nota_eliminar` AFTER DELETE
ON
    `asignacion_modulo_diplomante` FOR EACH ROW
INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "Calificacion_Diplomante", "Eliminó_nota", NOW());
