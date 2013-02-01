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
        $this->load->library(array("form_validation", "parser"));
        $this->load->helper(array("form", "url"));
    }

    public function index() {
        $this->parser->parse("template", array());
    }

    public function convert() {
        $dollars = $this->input->post("dollars");
        $dollars = $this->input->post("");
    }

}
