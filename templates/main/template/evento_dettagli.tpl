        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>{$dati.nome}</h1>
          <h5>{$dati.username}</h5>
          <p><img height="200" src="foto/{$dati.foto}" alt="{$dati.nome}" title="{$dati.nome}">{$dati.descrizione}</p>
          {if $dati.commento!=false}
          {section name=i loop=$dati.commento}
              {assign var="somma" value="`$dati.commento[i].votazione+$somma`"}
              {assign var="max" value="`$smarty.section.i.max`"}
          {/section}
          {/if}
          <p class="details"><b>Vino:</b> | {$dati_vino.nome} di {$dati_vino.produttore} ({$dati_vino.annata}) | </p>          
          <p class="details"><b>Organizzatore:</b> | {$dati.utente|ucfirst} | </p>          
		  <p class="details"><b>Data evento:</b> | {$dati.data|date_format:"%A %e %B %Y %H:%M"} | </p>
          <p class="details"><b>Data fine iscrizioni:</b> | {$dati.data_chiusura|date_format:"%A %e %B %Y %H:%M"} |</p>
          <p class="details"><b>Posti disponibili:</b> | {$dati.partecipanti} | Posti totali ({$dati.posti})</p>
		  <p class="details"><b>Location:</b> | {$dati_location.indirizzo} | {$dati_location.citta} |</p>
          <p class="details"><b>Media Voti:</b> | <a href="#">{if $max>0}{$somma/$max|string_format:"%.2f"}{else}-{/if}</a> | Categoria: <a href="#">{$dati.categoria}</a> | Prezzo: <a href="#">{$dati.prezzo}</a> |</p>
          {section name=j loop=$dati.commento}
          <h5 class="line">{$dati.commento[j].autore_username}</h5>
          <blockquote>
            <p>{$dati.commento[j].commento}</p>
            <p>voto: {$dati.commento[j].votazione}</p>
          </blockquote>
          {/section}
        </div>
        <div class="corner-content-1col-bottom"></div>
