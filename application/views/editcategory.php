<?php
$this->load->view("header");
echo validation_errors();
echo form_open("home/processeditcat");
echo "<div class='offset-1'>";
if (isset($category)) {
    $catName=$category->category;
    $id=$category->id;
}
else {
    $catName=set_value("category");
    $id=set_value("id");
}
echo form_hidden("id", $id);
echo "<div class='form-group'>";
echo form_label("Название категории","category");
echo form_input(array("name"=>"category","class"=>"form-control"), $catName);
echo "</div>";
echo form_submit(array("name"=>"send", "class"=>"btn btn-sm btn-primary"), "Сохранить");
echo "</div>";
echo form_close();
$this->load->view("footer");