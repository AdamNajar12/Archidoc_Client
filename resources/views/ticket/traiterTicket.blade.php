@extends('layouts.frontdash')
@section('main')
<form class="form" action="{{ route('ticket.traiterFront', $ticket->id) }}" method="POST"  enctype="multipart/form-data" >
							  @csrf
                              @method('PUT')	
                                	<!--begin::Card-->
									<div class="card">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Card header-->
											<div class="card-title fs-3 fw-bolder">Les Tickets </div>
											<!--end::Card header-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body">
											<!--begin::Row-->
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Type d' intervention </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
																	<select name="type_intervention" class="form-select form-select-solid fw-bolder">
                 @foreach ($type_intervention as $type_interventionId => $libelle)
            <option value="{{ $type_interventionId }}" {{ $type_interventionId == $ticket->type_intervention ? 'selected' : '' }}>
                {{ $libelle }}
            </option>
        @endforeach
            </select>
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Statut </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
																	<select name="statut" class="form-select form-select-solid fw-bolder">
                         @foreach ($statut as $statutId => $libelle)
            <option value="{{ $statutId }}" {{ $statutId == $ticket->statut ? 'selected' : '' }}>
                {{ $libelle }}
            </option>
        @endforeach
            </select>
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
                                            <div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">date demandé</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
															<input type="date" class="form-control form-control-solid" placeholder="" name="date_demande" id="date_demande" value="{{ $ticket->date_demande }}" />
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
                                            <div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Description </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
													<input type="text" class="form-control form-control-solid" placeholder="" name="description" id="description" value="{{ $ticket->description }}" />
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
                                            <div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3"> Vis à Vis</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
													<input type="text" class="form-control form-control-solid" placeholder="" name="vis_a_vis" id="vis_a_vis" value="{{ $ticket->vis_a_vis }}" />
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
											 <div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3"> code Client</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
															<span>{{$client->code_client}}</span>
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
                                            
                                            <div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Observation</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
															<textarea type="text" class="form-control form-control-solid" placeholder="" name="Observation" id="Observation"  ></textarea>
															
														</div>
														
														
													</div>
													<!--end::Progress-->
											    </div>
												<!--end::Col-->
											</div>
                                   <div class="row mb-8">
    <!--begin::Col-->
    <div class="col-xl-3">
        <div class="fs-6 fw-bold mt-2 mb-3">Fichier</div>
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-9">
        <!--begin::Progress-->
        <div class="d-flex flex-column">
            <div class="d-flex flex-wrap mb-3">
             	<input type="file" name="nom_fichier[]" id="nom_fichier" class="form-control form-control-solid" multiple />
            </div>
        </div>
        <!--end::Progress-->
    </div>
    <!--end::Col-->
</div>
               <div class="col-xl-9">                            
								<input type="submit" value="traiter" class="btn btn-primary"/>			
							</div>				
											
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<div class="card-footer d-flex justify-content-end py-6">
											<a href="/tickets/indexFront"class="btn btn-light me-3"id="kt_modal_add_customer_cancel">	Retour 
													</a>

										</div>
										<!--end::Card footer-->
									</div>
									<!--end::Card-->
								</form>















@endsection