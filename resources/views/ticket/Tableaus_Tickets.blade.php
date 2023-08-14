@extends("layouts.dashboard_Admin")
@section('content')
												<!--end::Menu item-->

						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<!--begin::Col-->
									
										<!--begin::Tables Widget 1-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Tickets en Cours </span>
													
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table align-middle gs-0 gy-5">
														<!--begin::Table head-->
														<thead>
															<tr>
																<th class="min-w-150px">type d intervention </th>
																<th class="min-w-150px">date demandé</th>
																<th class="min-w-150px">code client </th>
																<th class="min-w-150px">Application</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
                                                        @foreach($enCoursTickets as $enCourTicket)
															<tr>
																
																
																
																<td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $enCourTicket->typeIntervention->libelle }}</a>
																			
																		</div>
																	</div>
																</td>
                                                                <td>
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $enCourTicket->date_demande }}</a>
																			
																		</div>
																	</div>																
																</td>
                                                                <td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $enCourTicket->client->code_client }}</a>
																			
																		</div>
																	</div>
																</td>
                                                                
                                                                
                                                                
																<td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			 @foreach($enCourTicket->applications as $application)
                                                                             <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $application->libelle }}</a>
                                                                             @endforeach
																			
																		</div>
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
										</div>
										<!--endW::Tables Widget 1-->
								</div>	
									
                            </div>        <!--end::Col-->
						</div>			<!--begin::Col-->
									
										<!--begin::Tables Widget 2-->
										
														<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<!--begin::Col-->
									
										<!--begin::Tables Widget 1-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Tickets en attente </span>
													
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table align-middle gs-0 gy-5">
														<!--begin::Table head-->
														<thead>
															<tr>
																<th class="min-w-150px">type d intervention </th>
																<th class="min-w-150px">date demandé</th>
																<th class="min-w-150px">code client </th>
																<th class="min-w-150px">Application</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
                                                        @foreach($enattenteTickets as $enattenteTicket)
															<tr>
																
																
																
																<td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $enattenteTicket->typeIntervention->libelle }}</a>
																			
																		</div>
																	</div>
																</td>
                                                                <td>
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$enattenteTicket->date_demande }}</a>
																			
																		</div>
																	</div>																
																</td>
                                                                <td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $enattenteTicket->client->code_client }}</a>
																			
																		</div>
																	</div>
																</td>
                                                                
                                                                
                                                                
																<td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			 @foreach($enattenteTicket->applications as $application)
                                                                             <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $application->libelle }}</a>
                                                                             @endforeach
																			
																		</div>
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
										</div>
										<!--endW::Tables Widget 1-->
								</div>	
									
                            </div>        <!--end::Col-->
						</div>	
                        <div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<!--begin::Col-->
									
										<!--begin::Tables Widget 1-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Tickets Traités  </span>
													
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table align-middle gs-0 gy-5">
														<!--begin::Table head-->
														<thead>
															<tr>
																<th class="min-w-150px">type d intervention </th>
																<th class="min-w-150px">date demandé</th>
																<th class="min-w-150px">code client </th>
																<th class="min-w-150px">Application</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
                                                        @foreach($ticketsTraités as $TicketTraités)
															<tr>
																
																
																
																<td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $TicketTraités->typeIntervention->libelle }}</a>
																			
																		</div>
																	</div>
																</td>
                                                                <td>
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$TicketTraités->date_demande }}</a>
																			
																		</div>
																	</div>																
																</td>
                                                                <td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $TicketTraités->client->code_client }}</a>
																			
																		</div>
																	</div>
																</td>
                                                                
                                                                
                                                                
																<td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			 @foreach($TicketTraités->applications as $application)
                                                                             <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $application->libelle }}</a>
                                                                             @endforeach
																			
																		</div>
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
										</div>
										<!--endW::Tables Widget 1-->
								</div>	
									
                            </div>        <!--end::Col-->
						</div>
                        <div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<!--begin::Col-->
									
										<!--begin::Tables Widget 1-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Tickets Fermés  </span>
													
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table align-middle gs-0 gy-5">
														<!--begin::Table head-->
														<thead>
															<tr>
																<th class="min-w-150px">type d intervention </th>
																<th class="min-w-150px">date demandé</th>
																<th class="min-w-150px">code client </th>
																<th class="min-w-150px">Application</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
                                                        @foreach( $ticketsFermés as $Ticketfermé)
															<tr>
																
																
																
																<td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $Ticketfermé->typeIntervention->libelle }}</a>
																			
																		</div>
																	</div>
																</td>
                                                                <td>
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$Ticketfermé->date_demande }}</a>
																			
																		</div>
																	</div>																
																</td>
                                                                <td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $Ticketfermé->client->code_client }}</a>
																			
																		</div>
																	</div>
																</td>
                                                                
                                                                
                                                                
																<td class="text-end">
																	<div class="d-flex align-items-center">
																
																		<div class="d-flex justify-content-start flex-column">
																			 @foreach($Ticketfermé->applications as $application)
                                                                             <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $application->libelle }}</a>
                                                                             @endforeach
																			
																		</div>
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
										</div>
										<!--endW::Tables Widget 1-->
								</div>	
									
                            </div>        <!--end::Col-->
						</div>	
                        
	
	
                                    @endsection