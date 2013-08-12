<?php
class DB {
    // Propiedad estática db. Aquí guardamos la instancia de PDO.
    static $db;

    // Método estático para retornar la *única* instancia de PDO con la *única* conexión abierta contra la DB.
    static function getConnection(){
        // Si $db esta vacia, es porque no existe la conexión. Si es así, se instancia.
        if (empty(self::$db)) {
            /*self::$db = new PDO('mysql:host=127.0.0.1;dbname=tucanoto_clientes',
                                'root', '');*/
            self::$db = new PDO('mysql:host=tucanotours.com.ar;dbname=tucanoto_clientes',
                                'tucanoto_api', '%hRp?17E-1ru');
        }
        // Retornamos la instancia, ya sea recién generada o no.
        return self::$db;
    }

    // Método estático para retornar el statement generado por el método prepare de PDO.
    static function getStatement($query){
        // Se obtiene la conexión contra la DB.
        $db = self::getConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Se prepara la consulta y se retorna el statement.
        return self::$db->prepare($query);
    }
}