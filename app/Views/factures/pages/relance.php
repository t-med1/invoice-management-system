<?php $this->extend('layouts/master')?>

<!-- titre du page -->
<?php $this->section('title')?>
Relance - Page
<?php $this->endsection()?>

<!-- class active pour les liens du Navbar -->
<?php $this->section('relance')?>
active
<?php $this->endsection()?>

<!-- Le contenue du page home -->
<?php $this->section('content')?>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Type d'action</th>
                <th>Nb de jours après date d'échéance</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Relance 1</td>
                <td class="text-primary">1</td>
                <td class="text-primary">med.tela404@gmail.com</td>
                <td class="text-primary">2</td>
                <td>
                    <input type="checkbox" name="relanceCheck">
                </td>
            </tr>
            <tr>
                <td>Relance 2</td>
                <td class="text-primary">2</td>
                <td class="text-primary">fes.marketing@gmail.com</td>
                <td class="text-primary">5</td>
                <td>
                    <input type="checkbox" name="relanceCheck">
                </td>
            </tr>
            <tr>
                <td>Relance 3</td>
                <td class="text-primary">3</td>
                <td class="text-primary">06 20 36 96 27</td>
                <td class="text-primary">15</td>
                <td>
                    <input type="checkbox" name="relanceCheck">
                </td>
            </tr>
        </tbody>
    </table>
<?php $this->endsection()?>