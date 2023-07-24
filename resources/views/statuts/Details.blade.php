@extends('layouts.dashboard_Admin')
@section('main')
<form class="form">
									<!--begin::Card-->
									<div class="card">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Card header-->
											<div class="card-title fs-3 fw-bolder">Statuts</div>
											<!--end::Card header-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body">
											<!--begin::Row-->
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">libelle </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
															<span>{{$statut->libelle}}</span>
															
														</div>
														
														
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Col-->
											</div>
											 
                                             <div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Modificateur </div>
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
													<div class="fs-6 fw-bold mt-2 mb-3">Date de Creation </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<!--begin::Progress-->
													<div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
															<span>{{ $statut->created_at}}  </span>
															
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
															<span>{{ $statut->updated_at }}  </span>
															
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
											<a href="/statuts"class="btn btn-light me-3"id="kt_modal_add_customer_cancel">	Retour 
													</a>
										</div>
										<!--end::Card footer-->
									</div>
									<!--end::Card-->
								</form>















@endsection