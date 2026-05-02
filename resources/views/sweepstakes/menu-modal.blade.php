<table class="table table-striped table-bordered table-responsive-sm table-hover align=center" id="table_rifas">
				<thead>
								<tr>
												<th>Miniatura</th>
												<th>Status</th>
												<th>Sorteio</th>
												<th>Data Sorteio</th>
												<th>Valor</th>
												{{-- <th>Lista</th> --}}
												<th>Acões</th>
												<div id="copy-link"></div>
								</tr>
				</thead>
				@foreach ($rifas as $key => $product)
								<tbody>
												<tr>
																<td style="width: 50px;" class="text-center"><img style="border-radius: 5px;"
																								src="/products/{{ $product->imagem() ? $product->imagem()->name : '' }}" width="50"
																								alt=""></td>
																<td>{{ $product->status }}</td>
																<td>{{ $product->name }}</td>
																<td>
																				@if ($product->draw_date != null)
																								{{ \Carbon\Carbon::parse($product->draw_date)->format('d/m/Y H:i') }}
																				@endif
																</td>
																<td>{{ $product->price }}</td>
																<td style="width: 20%">
																				@if (!$product->processado)
																								<span class="badge bg-warning">Processando...</span>
																				@else
																								<div class="dropdown">
																												<button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
																																data-toggle="dropdown" aria-expanded="false">
																																Ações
																												</button>
																												<div class="dropdown-menu">
																																<a class="dropdown-item" style="cursor: pointer" data-bs-toggle="modal"
																																				data-bs-target="#modal_editar_rifa{{ $product->id }}"><i
																																								class="bi bi-pencil-square"></i>&nbsp;Editar</a>
																																<a class="dropdown-item" href="#deleteEmployeeModal{{ $product->id }}"
																																				style="cursor: pointer" data-toggle="modal"
																																				data-bs-target="#deleteEmployeeModal{{ $product->id }}"
																																				data-id="{{ $product->id }}"><i class="bi bi-trash3"></i>&nbsp;Excluir</a>
																																<a class="dropdown-item" href="{{ route('rifa.compras', $product->id) }}"><i
																																								class="fas fa-shopping-bag"></i></i>&nbsp;Compras</a>
																																<a class="dropdown-item" href="{{ route('resumoRifa', $product->id) }}"
																																				target="_blank"><i class="fas fa-list-ol"></i>&nbsp;Ver
																																				Resumo</a>
																																<a class="dropdown-item" href="#"
																																				onclick="copyResumoLink('{{ route('resumoRifa', $product->id) }}')"><i
																																								class="fas fa-link"></i>&nbsp;Copiar Link Resumo</a>
																																<a class="dropdown-item" href="javascript:void(0)" title="Ranking"
																																				onclick="openRanking('{{ $product->id }}')"><i
																																								class="fas fa-award"></i>&nbsp;Ranking</a>
																																<a class="dropdown-item" style="color: green" href="javascript:void(0)" title="Ranking"
																																				onclick="definirGanhador('{{ $product->id }}')"><i
																																								class="fas fa-check"></i>&nbsp;Definir Ganhador</a>
																																<a class="dropdown-item" href="javascript:void(0)" title="Ranking"
																																				onclick="verGanhadores('{{ $product->id }}')"><i
																																								class="fas fa-users"></i>&nbsp;Visualizar Ganhadores</a>
																												</div>
																								</div>
																				@endif
																</td>

												</tr>
								</tbody>
				@endforeach
</table>
