<?php
$this->load->view("header");
$user=$this->session->udetData("user");
echo "<h3>Привет, " . $user["name"] . "</h3>";
echo "<div> Вам, " . $user["age"] . " лет. Я угадал?</div>";
$this->load->view("footer");