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
                                    'maxlength' => '100',
                                    'size' => '50',
                                    'class' => 'validate',
                                    'value' => set_value('name')
                                );
                                echo form_input($data);
                                echo form_label('Nombre', 'name');
                                echo form_error('name', '<div style="color:red;">', '</div>');
                            ?>
                        </div>
                        <div class="input-field col s6">
                            <?php
                                $data = array(
                                    'name' => 'email',
                                    'id' => 'email',
                                    'maxlength' => '100',
                                    'size' => '50',
                                    'class' => 'validate',
                                    'type' => 'email',
                                    'value' => set_value('email')
                                );
                                echo form_input($data);
                                echo form_label('Correo', 'email');
                                echo form_error('email', '<div style="color:red;">', '</div>');
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <?php
                                $data = array(
                                    'name' => 'mobile_phone',
                                    'id' => 'mobile_phone',
                                    'maxlength' => '100',
                                    'size' => '50',
                                    'class' => 'validate',
                                    'value' => set_value('mobile_phone')
                                );
                                echo form_input($data);
                                echo form_label('Celular', 'mobile_phone');
                                echo form_error('mobile_phone', '<div style="color:red;">', '</div>');
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
                                echo form_error('reason', '<div style="color:red;">', '</div>');
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
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>