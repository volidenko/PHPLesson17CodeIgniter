<?php
class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("home_model");
        $this->load->library("customer");
    }

	public function index()
	{
        //echo "Привет, мир CodeIgniter!";
        $data["title"]="Тестовая страница";
        $data["text"]="Этот текст получен из метода Index контролера Home";
        $data["countries"]=array("Украина","Китай","США","Франция");
		$this->load->view("page1.php", $data);
    }

    public function getusers()
    {
        $data["customers"]=$this->home_model->getCustomers();
		$this->load->view("showCustomers", $data);
    }

    public function showUserForm()
    {
		$this->load->view("form_user_id");
    }

    public function getUser()
    {
        $send=$this->input->post("send");
        if($send){
            $userid=$this->input->post("userid");
		    $data["user"]=$this->home_model->getUserById($userid);
            $this->load->view("showUser", $data);
        }
        else $this->load->view("form_user_id");
    }

    public function showUserForm2()
    {
        $data["customers"]=$this->home_model->getCustomers();
		$this->load->view("form_user_id2", $data);
    }
    
    public function selectImage()
    {
        $send=$this->input->post("send");
        if(!isset($send)){
            $this->load->view("form_upload");
        }
        else{
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')){
                $data["error"]= $this->upload->display_errors();
                $this->load->view('form_upload', $data);
            }
            else
            {
                $info['upload_data'] = $this->upload->data();
                $path="assets/images/";
                $data=array("ItemId"=>1,"imagepath"=>$path.$info["upload_data"]["file_name"]);
                $id=$this->home_model->addImage($data);
                if($id){
                    $data["result"]="Изображения успешно загружено";
                    $this->load->view('form_upload', $data);
                }
                else
                $this->load->view('form_upload');
            }
        }
    }
    
    public function about(){
        $data["viewName"]="about";
        $data["viewData"]=array("title"=>"Пример окна компоновки","text"=>"Этот пример демонстрирует возможность");
        $data["viewData"]["cities"]=array("Киев", "Кривой Рог","Кропивницкий");
        $this->load->view("layout", $data);
    }

    public function getInfo(){
        $name=$this->input->get("name");
        $age=$this->input->get("age");
        echo "<h3> Привет, " .$name . ", тебе ". $age . " лет";
    }

    public function getInfo2($name, $age){
        echo "<h3> Привет, " .$name . ", тебе ". $age . " лет";
    }

    public function registration(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules('login', 'Логин', 'trim|required|min_length[3]|max_length[12]|is_unique[customers.login]',
        array("required"=>"Поле %s обязательно для заполнения", "is_unique"=>"Поле %s должно быть уникальным"));
        $this->form_validation->set_rules('pass1', 'Пароль', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('pass2', 'Подтверждение пароля', 'required|matches[pass1]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        if ($this->form_validation->run() == false)
        {
            $this->load->view("form_registration");
        }
        else
        {
            $data["success"] ="Поля успешно прошли валидацию";
            $this->load->view('form_registration', $data);
        }
    }

    public function useCustomClass(){
        $data["customer"] = new Customer("Vovan", "1111", "images/vovan.png");
        $this->load->view("showOwnCustomer", $data);
    }

    public function showCategories()
    {
        $data["categories"]=$this->home_model->getCategories();
        $this->load->view('categories', $data); 
    }

    public function editcat(){
        $id = $this->input->post("id");
        $data["category"] =$this->home_model->getCategoryById($id);
        $this->load->view("editcategory", $data);
    }

    public function processeditcat()
    {
        $send=$this->input->post("send");
        if(isset($send)){
            $this->load->library("form_validation");
            $this->form_validation->set_rules('category', 'Категория', 'required|is_unique[categories.category]');
            if($this->form_validation->run()==false)
            {
                $this->load->view("editcategory");
            }
            else
            {
                $category = $this->input->post("category");
                $id = $this->input->post("id");
                $this->home_model->editCategory($id, $category);
                $this->showCategories();
            }
        }
    }

    public function delcat(){
        $id = $this->input->get("id");
        $this->home_model->deleteCategory($id);
        $this->showCategories();
    }

    public function setUserData(){
        $this->session->deleteCategory($id);
        $this->load->view("showSession");

        $this->showCategories();
    }
}