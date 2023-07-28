  @extends('layouts.dashboard_Admin')
  @section('main')
  <div class="card card-xl-stretch mb-5 mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">les Traitements</span>
													
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
														<!--begin::Table head-->
														<thead>
															<tr class="fw-bolder text-muted">
																<th class="w-25px">
																	<div class="form-check form-check-sm form-check-custom form-check-solid">
																		<input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
																	</div>
																</th>
																<th class="min-w-150px">date de traitement</th>
                                                                <th class="min-w-150px">  Statut </th>
																
                                                                <th class="min-w-150px">   Code Client        </th>
                                                               
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
															@foreach ($traitements as $traitement)
                                                                
                                                           
                                                            <tr>
																<td>
																	<div class="form-check form-check-sm form-check-custom form-check-solid">
																		<input class="form-check-input widget-9-check" type="checkbox" value="1" />
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $traitement->date_traitement}}</a>
																			
																		</div>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $traitement->statuts}}</a>
																			
																		</div>
																	</div>
																</td>
                                                                <td>
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $traitement->ticket->client->code_client}}</a>
																			
																		</div>
																	</div>
																</td>
                                                               
                                                               <td>
                                                               <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="{{ route('traitement.details', $traitement->id) }}" class="btn btn-sm btn-light btn-active-primary me-2">Details</a>

                                                               </div>

                                                               </td>
																
															</tr>
                                                             @endforeach
														</tbody>
														<!--end::Table body-->
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->
											</div>
											<!--begin::Body-->
										</div>
										<!--end::Tables Widget 9-->
									</div>
									<!--end::Col-->
								</div>
                                @endsection