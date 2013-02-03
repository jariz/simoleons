<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JariZ
 * Date: 1-2-13
 * Time: 13:09
 * To change this template use File | Settings | File Templates.
 */
class sim extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->library(array("form_validation", "parser", "converter"));
        $this->load->helper(array("form", "url"));
    }

    public function index() {
        $this->page("home");
    }

    public function convertfrom() {
        $this->form_validation->set_rules("type", "required|max_length[3]");
        $this->form_validation->set_rules("q", "required|decimal");

        $q = $this->input->post("q");
        $type = $this->input->post("type");

        if($this->form_validation->run() != false) {
            try {
                $this->json_die(false, null, $this->converter->toSIM($type, $q));
            } catch(Exception $e) {
                $this->json_die(true, $e->getMessage());
            }
        } else $this->json_die(true, validation_errors("", ""));
    }

    public function page($page) {
        foreach($this->config->item("currency") as $code => $data) {
            $curr[] = array("code" => $code, "name" => $data[0], "active" => ($code == "USD" ? " selected=\"selected\"" : ""));
        }
        $nav = array();
        foreach($this->config->item("nav") as $item) {
            if(uri_string() == $item["url"])
                $item["active"] = " class=\"active\"";
            $nav[] = $item;
        }

        //die(__DIR__."/../views/pages/$page.php");
        if(file_exists(__DIR__."/../views/pages/{$page}.php")) {
            $this->parser->parse("template", array("content" => $this->load->view("pages/$page", '', true), "nav" => $nav, "curr" => $curr));
        } else show_404();
    }

    function json_die($error, $message, $attr=array()) {
        $ret = array("error" => $error, "message" => $message);
        foreach($attr as $key => $val) {
            $ret[$key] = $val;
        }

        $this->output->set_content_type("json")->set_output(json_encode($ret));
    }

}
