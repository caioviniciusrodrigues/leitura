@extends('layout.app')

@section('conteudo')

<!-- CARD -->
    <section id="minimal-statistics">
      <div class="row">
        <div class="col-12 mt-3 mb-1">
          <h4 class="text-uppercase"> <i class="icon-globe"></i> Acesso Rápido</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="http://esic.saocaetanodosul.sp.gov.br/catalogo.html" target="_blank"">
             <div class="card">
               <div class="card-content">
                 <div class="card-body">
                   <div class="media d-flex">
                     <div class="media-body text-left">
                       <h3 class="primary">Apartamentos</h3>
                     </div>
                     <div class="align-self-center">
                       <i class="icon-home danger font-large-2 float-right"></i>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             </a>
           </div>

           <div class="col-xl-3 col-sm-6 col-12">
            <a href="https://osc.saocaetanodosul.sp.gov.br/pages/Home.aspx" target="_blank"">
             <div class="card">
               <div class="card-content">
                 <div class="card-body">
                   <div class="media d-flex">
                     <div class="media-body text-left">
                       <h3 class="primary">Relatório Consumo</h3>
                     </div>
                     <div class="align-self-center">
                       <i class="icon-graph warning font-large-2 float-right"></i>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             </a>
           </div>

      </div>
    </section>

<!-- CARD FIM -->



@endsection
