@extends('layouts.master')

@section('title')
	<title>Dashboard | JICA</title>
@endsection

@section('content')

    {{-- <div class="col-md-4">
        <div class="widget stats-widget">
            <div class="widget-body clearfix">
                <div class="pull-left">
                    <h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp">0</span></h3>
                    <small class="text-color">Jumlah Pengajuan Cuti</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
            </div>
            <a href="">
                <footer class="widget-footer bg-primary">
                    <small>Lihat Detail</small>
                    <span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
                </footer>
            </a>
        </div><!-- .widget -->
    </div>

    <div class="col-md-4">
        <div class="widget stats-widget">
            <div class="widget-body clearfix">
                <div class="pull-left">
                    <h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp">0</span></h3>
                    <small class="text-color">Jumlah Cuti Disetujui</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
            </div>
            <a href="">
                <footer class="widget-footer bg-success">
                    <small>Lihat Detail</small>
                    <span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
                </footer>
            </a>
        </div><!-- .widget -->
    </div>

    <div class="col-md-4">
        <div class="widget stats-widget">
            <div class="widget-body clearfix">
                <div class="pull-left">
                    <h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp">0</span></h3>
                    <small class="text-color">Jumlah Cuti Ditolak</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
            </div>
            <a href="">
                <footer class="widget-footer bg-danger">
                    <small>Lihat Detail</small>
                    <span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
                </footer>
            </a>
        </div><!-- .widget -->
    </div>

    <div class="col-md-6">
        <div class="widget">
        <header class="widget-header">
            <h4 class="widget-title"><i class="fa fa-pie-chart text-success"></i> &nbsp; Grafik Cuti & Ijin Berdasarkan Status Approval</h4>
        </header><!-- .widget-header -->
        <hr class="widget-separator">
        <div class="widget-body">
            <div data-plugin="chart" data-options="{
                tooltip : {
                    trigger: 'item',
                    formatter: '{a} <br/>{b} : {c} ({d}%)'
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: [ 'Pengajuan Disetujui', 'Pengajuan Ditolak' ]
                },
                series : [
                    {
                        name: 'Persentase Data',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:[ {value:3, name:'Pengajuan Disetujui'}, {value:4, name:'Pengajuan Ditolak'} ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            }" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1531196547417"><div style="position: relative; overflow: hidden; width: 462px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none;"></div><canvas width="462" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="462" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="462" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><div class="echarts-tooltip zr-element" style="position: absolute; display: none; border-style: solid; white-space: nowrap; transition: left 0.4s, top 0.4s; background-color: rgba(0, 0, 0, 0.9); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); padding: 12px 16px; top: 140px; left: 234px;">Persentase Data <br>Asosiasi Industri : 1 (50.00%)</div></div></div>
        </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
        
    <div class="col-md-6">
        <div class="widget">
        <header class="widget-header">
            <h4 class="widget-title"><i class="fa fa-list text-success"></i> &nbsp; Pengajuan Cuti Terakhir</h4>
        </header><!-- .widget-header -->
        <hr class="widget-separator">
        <div class="widget-body">
            <table class="table table-bordered" data-plugin="DataTable">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>NIP</th>
                        <th>Jenis Cuti / Ijin</th>
                        <th>Tanggal Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <div class="text-center">
                <a href="">Lihat Selengkapnya</a>
            </div>
        </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div> --}}
    
@endsection