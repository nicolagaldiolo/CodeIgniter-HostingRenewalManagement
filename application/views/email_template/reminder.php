<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>Servizi in scadenza</title>
  </head>
  <body>
    <div style="max-width: 800px; margin: 0; padding: 30px 0;">
      
      <h3>Ciao, di seguito l'elenco dei servizi in scadenza:</h3>

      <div style="padding:15px 20px; background:#f5f5f5;">
        <h3>Mese corrente</h3>    
        <?php if(!empty($domainsCurrent)) : ?>    
          <p>Servizi in scadenza questo mese</p> 
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

      <br>
      <div style="padding:15px 20px; background:#f5f5f5;">
      <?php if(!empty($domainsExpired)) : ?>    
        <h3>ATTENZIONE: Ci sono servizi scaduti il mese scorso non ancora gestiti</h3>
        <p>Servizi scaduti il mese scorso</p>
        <table width="100%" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <th>Dominio</th>  
            <th>Scadenza</th>  
            <th>Importo</th>  
          </tr>  
          <?php foreach($domainsExpired as $domain): ?>
            <tr>
              <td><?php echo $domain->url; ?></td>
              <td><?php echo $domain->renewal; ?></td>
              <td><?php echo $domain->fee; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <strong>Non hai nessun rinnovo non gestito dal mese precedente</strong>
      <?php endif; ?>
      </div>
    </div>
  </body>
</html>