@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                @if (session('status'))
				    <div class="alert alert-success">
				        {{ session('status') }}
				    </div>
				@endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('course_register_fill') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="student_id" value="{{ Auth::user()->id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
						      <select name="department" id="inputState" class="form-control">
						        <option value="EEE">EEE</option>
						        <option value="CSE">CSE</option>
						        <option value="CE">CE</option>
						        <option value="ME">ME</option>
						        <option value="ETE">ETE</option>
						        <option value="PME">PME</option>
						        <option value="MIE">MIE</option>
						        <option value="CWRE">CWRE</option>
						        <option value="URP">URP</option>
						        <option value="Architecture">Architecture</option>

						      </select>
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="" class="col-md-4 control-label">Hall_Name</label>

                            <div class="col-md-6">
						      <select name="hall_name" id="inputState" class="form-control">
						        <option>SMSH</option>
						        <option>TH</option>
						        <option>Q.K.H</option>
								<option>BBH</option>
						        <option>S.K.H</option>

						      </select>
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('advisor') ? ' has-error' : '' }}">
                            <label for="advisor" class="col-md-4 control-label">Advisor</label>

                            <div class="col-md-6">
                                <input id="advisor" type="text" class="form-control" name="advisor" value="{{ old('advisor') }}" required>

                                @if ($errors->has('advisor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('advisor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('hall_transaction') ? ' has-error' : '' }}">
                            <label for="hall_transaction" class="col-md-4 control-label">Hall_Transaction</label>

                            <div class="col-md-6">
                                <input id="hall_transaction" type="number" class="form-control" name="hall_transaction" required>

                                @if ($errors->has('hall_transaction'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hall_Transaction') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('course_transaction') ? ' has-error' : '' }}">
                            <label for="course_transaction" class="col-md-4 control-label">Course_Transaction</label>

                            <div class="col-md-6">
                                <input id="course_transaction" type="text" class="form-control" name="course_transaction" required>

                                @if ($errors->has('course_transaction'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course_transaction') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  

						 <div class="form-group">
                            <label for="" class="col-md-4 control-label">Student_Type</label>

                            <div class="col-md-6">
						      <select name="student_type" id="inputState" class="form-control">
						        <option value="Regular">Regular</option>
						        <option value="Irregular">Irregular(Backlog/Selfstudy)</option>
						      </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Semester</label>

                            <div class="col-md-6">
						      <select name="level" id="inputState" class="form-control">
						        <option >L-1 T-I</option>
						        <option>L-1 T-II</option>
						        <option>L-2 T-I</option>
						        <option>L-2 T-II</option>
						        <option>L-3 T-I</option>
						        <option>L-3 T-II</option>
						        <option>L-4 T-I</option>
						        <option>L-4 T-II</option>
						      </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Nationality</label>

                            <div class="col-md-6">
						      <select name="nationality" id="inputState" class="form-control">
						        <option selected>Bangladeshi</option>
						        <option>Foreigner</option>
						      </select>
                            </div>
                        </div>
 
                      	<input type="hidden" name="status" value="0">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
