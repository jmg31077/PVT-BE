@extends('layouts.app')
@section('title', 'Fondo de Retiro')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        {{-- {!!Breadcrumbs::render('show_qualification_certification_retirement_fund', $retirement_fund)!!} --}}
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>SALARIO PROMEDIO COTIZABLE</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped" id="datatables-certification">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Periodo</th>
                            <th>Haber Basico</th>
                            <th>Categoria</th>
                            <th>Salario Cotizable</th>
                            <th>Total Aporte</th>
                            <th>Aporte FRPS</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
<script>
    $(document).ready(function () {
        var datatable_contri = $('#datatables-certification').DataTable({
            responsive: true,
            fixedHeader: {
            header: true,
            footer: true,
                headerOffset: $('#navbar-fixed-top').outerHeight()
            },
            order: [],
            // ajax: "http://wwwachuchus.test/ret_fun/3/qualification/get_data_certification",
            ajax: "{{ url('get_data_certification', 4) }}",
            lengthMenu: [[15, 25, 50,100, -1], [15, 25, 50,100, "Todos"]],
            //dom:"<'row'<'col-sm-6'l><'col-sm-6'>><'row'<'col-sm-12't>><'row'<'col-sm-5'i>><'row'<'bottom'p>>",
            dom: '< "html5buttons"B>lTfgitp',
            buttons:[
                // {extend: 'colvis', columnText: function ( dt, idx, title ) { return (idx+1)+': '+title; }},
                { extend: 'copy'},
                { extend: 'csv'},
                // { extend: 'excel', title: "{!! $retirement_fund->id().date('Y-m-d') !!}"},
            ],
            columns:[
                {data: 'month_year' },
                {data: 'base_wage'},
                {data: 'seniority_bonus'},
                // {data: 'quotable_salary'},
                {data: 'total'},
                {data: 'retirement_fund'},
            ],
        });
    });

</script>
@endsection