@include('welcome/header')
@yield('header')
<div class="panel-group" id="accordion" style="min-hight:700px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
I have a question or need help to perform an anlaysis. Can I contact you to get any help?        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse ">
      <div class="panel-body">
Yes, we are reachable by email. For general questions about OMA, our preferred way of answering questions is through BioStar. Please consider asking your question there, including the tag OMA. We monitor BioStar for such questions and will answer them directly on that platform.       </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
Why is my favorite genome not present in OMA?        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
        We strive to include as many complete genomes as possible, provided they are released publicly and meet reasonable quality standards. We are open for suggestions and are willing to adapt our priority queue based on user requests. If you want to analyze your "own" genomes, you can use the <a href="/standalone">OMA standalone pipeline</a> to do so and even make use of already analyzed genomes using the export function. OMA standalone is licenced under the Mozilla Public License Version 2.0. In a nutshell, OMA standalone is open source and free for commercial and non-commercial use.       </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
What is the difference between OMA Groups and Hierarchical Groups?        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body">
OMA Groups are sets of genes which are all orthologous to each other according to the definition of Fitch (1970). In presence of a duplication in certain gene familly, this grouping strategy will pick only one of the two lineages resulting from the duplication event. The hierarchical orthologous groups (HOGs) are defined as sets of genes that have descended from a single common ancestor within a taxonomic range of interest, i.e. they correspond to the member of a clade in a gene tree rooted at the speciation node of interest.
Which type of groups you should choose depends highly on the type of your analysis.      </div>
    </div>
  </div>
        <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
Why are OMA Groups often relatively small? Covering so many genomes, I expected them to be much bigger.         </a>
      </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse">
      <div class="panel-body">
For the OMA Groups, we apply a very stringent grouping strategy. All the members of a group need to be bona fide orthologs to each other, i.e. the form a clique in graph-theoretic terms. This grouping strategy is mainly intended for applications which require orthologs of high confidence, e.g. for reconstructing species trees. A gene tree built from the members of an OMA Group should - in absence of LGT are incomplete lineage sorting - be congruent with the underlying species tree. If you are interested in larger groups, consider using the OMA HOGs. These hierarchical orthologous groups are defined as set of genes that all started diverging from a single ancestral gene at a given time point of reference.      </div>
    </div>
  </div>
        
            <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseHeight">
          Under what licence is OMA distributed </a>      </h4>
    </div>
    <div id="collapseHeight" class="panel-collapse collapse">
      <div class="panel-body">
        The OMA Browser is available under the Creative Commons Attribution-Share Alike 2.5 License, and the OMA standalone package under the MPL 2.0 (open source) licence.</div>    </div>
  </div>
      
      
      
      
      
      
</div>      
</div>

@include('welcome/footer')
@yield('footer')