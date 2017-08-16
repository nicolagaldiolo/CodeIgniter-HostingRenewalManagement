<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>Servizi in scadenza</title>
  </head>
  <body>
    <div style="max-width: 800px; margin: 0; padding: 30px 0;">
      <?php if(!empty($domainsCurrent)) : ?>    
        <p>Ciao, i servizi in scadenza del mese corrente sono:</p>
        <table width="100%" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <th>Dominio</th>  
            <th>Scadenza</th>  
            <th>Importo</th>  
          </tr>  
          <?php foreach($domainsCurrent as $domain): ?>
            <tr>
              <td><?php echo $domain->url; ?></td>
              <td><?php echo $domain->renewal; ?></td>
              <td><?php echo $domain->fee; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <p>Non hai nessun rinnovo per questo mese.</p>
      <?php endif; ?>
    </div>
  </body>
</html>