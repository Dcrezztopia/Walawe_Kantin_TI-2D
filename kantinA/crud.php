<?php
interface Crud
{
    public function Create($data);
    public function Read();
    public function Update($data);
    public function Delete($data);
}
?>