@extends('layouts.dashboard_Admin')
@section('main')
<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title fw-bolder text-dark">les Applications </h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">
												<!--begin::Item-->
                                                @foreach ($applications as $application)
                                                    
                                               
												<div class="d-flex align-items-center mb-8">
													<!--begin::Bullet-->
													<span class="bullet bullet-vertical h-40px bg-success"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<div class="form-check form-check-custom form-check-solid mx-5">
														<input class="form-check-input" type="checkbox" value="">
													</div>
													<!--end::Checkbox-->
													<!--begin::Description-->
													<div class="flex-grow-1">
														<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">{{$application->libelle}}</a>
														<span class="text-muted fw-bold d-block">Due in 2 Days</span>
													</div>
													<!--end::Description-->
													<span class="badge badge-light-success fs-8 fw-bolder">New</span>
												</div>
												 @endforeach
												<!--end:Item-->
												<!--begin::Item-->
												
												<!--end:Item-->
												<!--begin::Item-->
												
												<!--end:Item-->
												<!--begin::Item-->
												
												<!--end:Item-->
												<!--begin::Item-->
												
												<!--end:Item-->
												<!--begin::Item-->
												
												<!--end:Item-->
											</div>
											<!--end::Body-->
										</div>



@endsection