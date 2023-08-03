@extends('layouts.dashboard_Admin')
@section('main')
<form class="form">
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
													<div class="fs-6 fw-bold mt-2 mb-3"> Application</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
																					@foreach ($applications as $application)
    <span>{{ $application->libelle }}</span>
@endforeach
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
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
															<span>{{$type_intervention->type_intervention}}</span>
															
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
															<span>{{$statut->statut}}</span>
															
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
															<span>{{$ticket->date_demande}}</span>
															
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
															<span>{{$ticket->description}}</span>
															
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
															<span>{{$ticket->vis_a_vis}}</span>
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">les utilisateurs assignnés </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
                                                     <div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
        <!-- Ici, vous pouvez ajouter tout contenu que vous souhaitez afficher avant la liste des utilisateurs -->
                                                       </div>
    
    <!-- Boucle pour afficher chaque utilisateur -->
                                                       @foreach ($utilisateursAffectes as $userAssigné)
                                                       <div class="mb-2">
                                                          <span class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3" >{{ $userAssigné->prenom }} {{ $userAssigné->nom }}</span>
                                                          </div>
                                                          @endforeach
                                                          </div>
													<!--end::Progress-->
											    </div>
												<!--end::Col-->
											</div>
                                            
                                            <div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">dernier Modificateur </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
														
																<span>{{ $user->user_prenom }} {{ $user->user_nom }} </span>
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
                @foreach ($ticket->fichiers as $fichier)
                    <a href="{{ asset('storage/' . $fichier->nom_fichier) }}" target="_blank" class="badge badge-secondary mb-2">{{ $fichier->nom_fichier }}</a>
                @endforeach
            </div>
        </div>
        <!--end::Progress-->
    </div>
    <!--end::Col-->
</div>
                                          <div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Date de Creation </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
															<span>{{ $ticket->created_at}}  </span>
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
											
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Date de mise a jour  </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
															<span>{{ $ticket->updated_at }}  </span>
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
											
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<div class="card-footer d-flex justify-content-end py-6">
											<a href="/tickets"class="btn btn-light me-3"id="kt_modal_add_customer_cancel">	Retour 
													</a>
										</div>
										<!--end::Card footer-->
									</div>
									<!--end::Card-->
								</form>















@endsection