@extends('layout.master')
@section('title','Halaman Profile Member')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Profil</h3>
                                <a href="/member/show/profile" class="btn btn-primary">Edit Profil</a>
                                <a href="/member/{{ Auth::user()->id_member }}/show/password" class="btn btn-secondary">Ubah Password</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive align-content-center" id="example">
                                       <tr>
                                            <th>ID</th>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    {{Auth::user()->id_member}}
                                                </div>
                                            </td>
                                       </tr>
                                       <tr>
                                            <th>Nama</th>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    {{Auth::user()->nama}}
                                                </div>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    {{Auth::user()->username}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                                <th>No Telp</th>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        {{Auth::user()->no_telp}}
                                                    </div>
                                                </td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    {{Auth::user()->email}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    {{Auth::user()->alamat}}
                                                 </div>
                                            </td>
                                        </tr>
                                        <tr></tr>
                                    </table>
                                  </div>
                            </div>    
                        </div>    
                    </div>    
                </div>    
            </div>    
        </section>    
    </div>    
@endsection