@extends('User.usersidebar')
@section('Section')
    @include('User.UserNav')
@endsection

@section('section')


             <section class="py-5">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-12">
                             <h4> My profile page</h4>
                             <hr>
                             <form method="post" action="{{ route('update_profile', $userInfo->id) }}">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$userInfo->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" name="email" readonly value="{{$userInfo->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Contact</label>
                                            <input type="" class="form-control" name="contact" value="{{$userInfo->contact}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Alternate contact</label>
                                            <input type="text" class="form-control" name="alt_cont" value="{{$userInfo->alt_contact}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Address(road no, flat no)</label>
                                            <input type="text" class="form-control" name="address" value="{{$userInfo->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">City</label>
                                            <input type="text" class="form-control" name="city" value="{{$userInfo->city}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Zip code</label>
                                            <input type="text" class="form-control" name="zip" value="{{$userInfo->zip_code}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update profile</button>
                                    </div>
                                </div>
                         </div>
                     </div>
                 </div>
             </section>

@endsection
