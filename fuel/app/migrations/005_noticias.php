<?php
namespace Fuel\Migrations;

class Noticias
{

    function up()
    {
        \DBUtil::create_table('noticias', array(
            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'descripcion' => array('type' => 'varchar', 'constraint' => 100),
            'id_usuarios' => array('type' => 'int', 'constraint' => 5),
        ),

        array('id'), false, 'InnoDB', 'utf8',
            array(
                array(
                    'constraint' => 'claveAjenaNoticiasAUsuarios',
                    'key' => 'id_usuarios',
                    'reference' => array(
                        'table' => 'usuarios',
                        'column' => 'id',
                    ),
                    'on_update' => 'CASCADE',
                    'on_delete' => 'RESTRICT'
                )
            )
        );    
    }

    function down()
    {
       \DBUtil::drop_table('noticias');
    }
}