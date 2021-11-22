<?php
include '../config/confDBPDO.php';
try{ //Dentro va el código susceptible de dar error
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta = $miDB->prepare(<<<QUERY
                        insert into Departamento values
                        ("UNO", "Primer departamento", null, 30.45),
                        ("DOS", "Segundo departamento", null, 66.66),
                        ("TRE", "Tercer departamento", null, 1.11)
                    QUERY);
                $consulta->execute();
            }
            catch(PDOException $miExceptionPDO){ //Lo que se muestra en caso de error
                echo "Error: ".$miExceptionPDO->getMessage(); //Mensaje de error
                echo "<br>";
                echo "Código de error: ".$miExceptionPDO->getCode(); //Código de error
            }
            finally{ //Ocurre tanto si da error como si no lo da
             //Cerrar la conexión
             unset($miDB);
            }


