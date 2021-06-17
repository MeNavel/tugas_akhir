<x-app-layout>

    <div class="py-2"></div>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <style>
        .center-cropped {
          width: 193px;
          height: 193px;
          object-fit: cover;
          border-radius: 50%;
        </style>
}
        <title>Upload Image</title>
    </head>
    <body>
        <div class="container">
            <div class="container">
                <div class="main-body">
                      <div class="row gutters-sm">
                        <div class="col-md-4 mb-2">
                          <div class="card">
                            <div class="card-body">
                              <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('storage') }}/{{ $foto }}" alt="Admin" class="center-cropped rounded-circle" width="150">
                                <div class="mt-3">
                                  <h4>{{ $id->kode }}</h4>
                                  <p class="text-secondary mb-3">{{ $data }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Nama Lengkap</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  {{ $id->nama }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  {{ $id->email }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Nomor Telfon</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  {{ $id->hp }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  {{ $id->alamat }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Terdeteksi</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  {{ $tgl }}
                                </div>
                              </div>
                              <hr>
                            </div>
                          </div>
                        </div>
                      </div>
            
                    </div>
                </div>
        </div>
    </body>
    </html>
    </x-app-layout>