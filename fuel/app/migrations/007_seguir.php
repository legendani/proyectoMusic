<?php
namespace Fuel\Migrations;

class Seguir
{

    function up()
    {
        \DBUtil::create_table('seguir', array(
            'id_usuarios' => array('type' => 'int', 'constraint' => 5),
            'id_usuarios2' => array('type' => 'int', 'constraint' => 5)
        ),

        array('id_usuarios', 'id_usuarios2'), false, 'InnoDB', 'utf8_unicode_ci',
            array(
                array(
                    'constraint' => 'claveAjenaSeguirAUsuarios',
                    'key' => 'id_usuarios',
                    'reference' => array(
                        'table' => 'usuarios',
                        'column' => 'id',
                    ),
                    'on_update' => 'CASCADE',
                    'on_delete' => 'RESTRICT'
                ),
                array(
                    'constraint' => 'claveAjenaSeguirAUsuarios2',
                    'key' => 'id_usuarios2',
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
       \DBUtil::drop_table('seguir');
    }
}