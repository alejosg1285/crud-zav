<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lista registros</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>
        <header>
            <h1 class="center-align"><?= $title; ?></h1>
        </header>

        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a href="#add_register" class="waves-effect waves-light btn right modal-trigger">Nuevo</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <?php
                        $this->table->set_heading(array('#', 'Nombre', 'Correo', 'Celular', 'Razon de visita', 'Comentario', ''));

                        $records = json_decode($data);
                        foreach ($records as $record) {
                            $this->table->add_row(
                                    array(
                                            $record->id,
                                            $record->name,
                                            $record->email,
                                            $record->mobile_phone,
                                            $record->reason,
                                            $record->comment,
                                            '<a data-id="'.$record->id.'" class="waves-effect waves-light btn modal-trigger red delete-modal-js" href="#delete_register">Eliminar</a>'
                                    )
                            );
                        }
                        echo $this->table->generate();
                    ?>
                </div>
            </div>
        </div>

        <!-- Modal Structure new register -->
        <div id="add_register" class="modal">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <?php
                            $attributes = array('class' => 'col s12', 'id' => 'add_register');
                            echo form_open('register/save', $attributes);

                        ?>
                        <div class="row">
                            <div class="input-field col s6">
                                <?php
                                    $data = array(
                                        'name' => 'name',
                                        'id' => 'name',
                                        'value' => '',
                                        'maxlength' => '100',
                                        'size' => '50',
                                        'class' => 'validate'
                                    );
                                    echo form_input($data);
                                    echo form_label('Nombre', 'name');
                                ?>
                            </div>
                            <div class="input-field col s6">
                                <?php
                                    $data = array(
                                        'name' => 'email',
                                        'id' => 'email',
                                        'value' => '',
                                        'maxlength' => '100',
                                        'size' => '50',
                                        'class' => 'validate',
                                        'type' => 'email'
                                    );
                                    echo form_input($data);
                                    echo form_label('Correo', 'email');
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <?php
                                    $data = array(
                                        'name' => 'mobile_phone',
                                        'id' => 'mobile_phone',
                                        'value' => '',
                                        'maxlength' => '100',
                                        'size' => '50',
                                        'class' => 'validate'
                                    );
                                    echo form_input($data);
                                    echo form_label('Celular', 'mobile_phone');
                                ?>
                            </div>
                            <div class="input-field col s6">
                                <?php
                                    $options = array(
                                        '' => '',
                                        'buy' => 'Compra',
                                        'sale' => 'Venta',
                                        'rent' => 'Renta'
                                    );
                                    echo form_dropdown('reason', $options, '', ['class' => 'browser-default']);
                                    echo form_label('Motivo de visita', 'reason');
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <?php
                                    $data = ['id' => 'comment', 'name' => 'comment'];
                                    $options = ['class' => 'materialize-textarea'];
                                    echo form_textarea($data, '', $options);
                                    echo form_label('Comentario', 'commet');
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <?php
                                    $options = ['class' => 'btn waves-effect waves-light right'];
                                    echo form_submit('add_register', 'Registrar', $options);

                                    echo form_close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Structure delete record -->
        <div id="delete_register" class="modal">
            <div class="modal-content">
                <h4>Eliminar registro</h4>
                <p>¿Esta seguro de eliminar el registro?</p>
            </div>
            <div class="modal-footer">
                <?php
                    $attributes = array('class' => 'col s12', 'id' => 'delete_register');
                    $hidden = array('id_register' => '');
                    echo form_open('register/delete', $attributes, $hidden);

                    $options = ['class' => 'modal-close waves-effect waves-green btn-flat'];
                    echo form_submit('add_register', 'Eliminar', $options);

                    echo form_close();
                ?>
            </div>
        </div>

        <!-- Compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.modal').modal();

                $(document).on("click", ".delete-modal-js", function () {
                    var id_record = $(this).data('id');
                    $('input[name="id_register"]').val(id_record);
                    console.log(id_record);
                    var elem = $('.modal#delete_register');
                    var instance = M.Modal.getInstance(elem);
                    instance.open();
                    /*var city_id = $(this).data('id');
                    $(".modal-body #city_name").val( city_name );
                    //set the forms action to include the city_id
                    $(".modal-body form").attr('action','/cities/edit_city/'+city_id);
                    $('#editCityDialog').modal('show');*/
                });
            });
        </script>
    </body>
</html>