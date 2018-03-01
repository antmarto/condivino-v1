<?php /* Smarty version 2.6.26, created on 2015-09-01 01:58:19
         compiled from evento_dettagli.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucfirst', 'evento_dettagli.tpl', 13, false),array('modifier', 'date_format', 'evento_dettagli.tpl', 14, false),array('modifier', 'string_format', 'evento_dettagli.tpl', 18, false),)), $this); ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1><?php echo $this->_tpl_vars['dati']['nome']; ?>
</h1>
          <h5><?php echo $this->_tpl_vars['dati']['username']; ?>
</h5>
          <p><img height="200" src="foto/<?php echo $this->_tpl_vars['dati']['foto']; ?>
" alt="<?php echo $this->_tpl_vars['dati']['nome']; ?>
" title="<?php echo $this->_tpl_vars['dati']['nome']; ?>
"><?php echo $this->_tpl_vars['dati']['descrizione']; ?>
</p>
          <?php if ($this->_tpl_vars['dati']['commento'] != false): ?>
          <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
              <?php $this->assign('somma', ($this->_tpl_vars['dati']['commento'][$this->_sections['i']['index']]['votazione']+$this->_tpl_vars['somma'])); ?>
              <?php $this->assign('max', ($this->_sections['i']['max'])); ?>
          <?php endfor; endif; ?>
          <?php endif; ?>
          <p class="details"><b>Vino:</b> | <?php echo $this->_tpl_vars['dati_vino']['nome']; ?>
 di <?php echo $this->_tpl_vars['dati_vino']['produttore']; ?>
 (<?php echo $this->_tpl_vars['dati_vino']['annata']; ?>
) | </p>          
          <p class="details"><b>Organizzatore:</b> | <?php echo ((is_array($_tmp=$this->_tpl_vars['dati']['utente'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
 | </p>          
		  <p class="details"><b>Data evento:</b> | <?php echo ((is_array($_tmp=$this->_tpl_vars['dati']['data'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A %e %B %Y %H:%M") : smarty_modifier_date_format($_tmp, "%A %e %B %Y %H:%M")); ?>
 | </p>
          <p class="details"><b>Data fine iscrizioni:</b> | <?php echo ((is_array($_tmp=$this->_tpl_vars['dati']['data_chiusura'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A %e %B %Y %H:%M") : smarty_modifier_date_format($_tmp, "%A %e %B %Y %H:%M")); ?>
 |</p>
          <p class="details"><b>Posti disponibili:</b> | <?php echo $this->_tpl_vars['dati']['partecipanti']; ?>
 | Posti totali (<?php echo $this->_tpl_vars['dati']['posti']; ?>
)</p>
		  <p class="details"><b>Location:</b> | <?php echo $this->_tpl_vars['dati_location']['indirizzo']; ?>
 | <?php echo $this->_tpl_vars['dati_location']['citta']; ?>
 |</p>
          <p class="details"><b>Media Voti:</b> | <a href="#"><?php if ($this->_tpl_vars['max'] > 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['somma']/$this->_tpl_vars['max'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<?php else: ?>-<?php endif; ?></a> | Categoria: <a href="#"><?php echo $this->_tpl_vars['dati']['categoria']; ?>
</a> | Prezzo: <a href="#"><?php echo $this->_tpl_vars['dati']['prezzo']; ?>
</a> |</p>
          <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['dati']['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
          <h5 class="line"><?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['autore_username']; ?>
</h5>
          <blockquote>
            <p><?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['commento']; ?>
</p>
            <p>voto: <?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['votazione']; ?>
</p>
          </blockquote>
          <?php endfor; endif; ?>
        </div>
        <div class="corner-content-1col-bottom"></div>