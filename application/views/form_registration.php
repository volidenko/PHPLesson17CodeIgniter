<?php
$this->load->view("header");
echo validation_errors();
if (isset($success)) {
    echo "<h3/><span style='color: green'>" . $success . "</span><h3/>";
}
echo form_open("home/registration");
echo "<div class='col-10 offset-1'>";
    echo "<div class='form-group'>";
    echo form_label("Введите Логин", "login");
    echo form_input(array("type"=>"text", "name"=>"login", "class"=>"form-control"), set_value("login"));
    echo "</div>";
    echo "<div class='form-group'>";
    echo form_label("Введите пароль", "pass1");
    echo form_input(array("type"=>"password", "name"=>"pass1", "class"=>"form-control"), set_value("pass1"));
    echo "</div>";
    echo "<div class='form-group'>";
    echo form_label("Подтвердите пароль", "pass2");
    echo form_input(array("type"=>"password", "name"=>"pass2", "class"=>"form-control"), set_value("pass2"));
    echo "</div>";
    echo "<div class='form-group'>";
    echo form_label("Email:", "email");
    echo form_input(array("type"=>"email", "name"=>"email", "class"=>"form-control"), set_value("email"));
    echo "</div>";
    echo form_submit(array("name"=>"send", "class"=>"btn btn-sm btn-primary"), "Зарегистрироваться");
echo "</div>";
echo form_close();
$this->load->view("footer");