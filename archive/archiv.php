<?php
//extract data from the post
//set POST variables
$url = 'http://cahnrs-api-pdf.wpdev.cahnrs.wsu.edu/';
$fields = array(
	'key' => urlencode('78a4s395oaZwd5hC41SOG3p3at6E4ZGn'),
	'template' => 'animal-ag',
	'title'   => 'The Threat of Foreign Animal Diseases and The Need for Agriculture Biosecurity',
	'html' => '<div class="row halves"><div class="column one"><p>Foreign animal diseases are not only a serious threat to American livestock and agriculture, but also to our nation’s economy and security. A wide variety of devastating plant and animal pathogens exist outside of the U.S. Many of these agents could be accidentally or intentionally transported inside the U.S borders. The transportation of livestock and agriculture products is monitored and regulated by both the U.S.D.A. and Washington State Department of Agriculture. However, the concern does exist that a foreign animal disease outbreak could occur accidentally or by terrorist means. Therefore, it is critical that agriculturist and American citizens take steps to safeguard American agriculture. 

</p><p>Washington’s farmers and ranchers must pay close attention to these issues because of the state’s dependency on the agricultural economy and its location. Washington State’s location causes concern because of the connection it has to many foreign ports and international travelers. For these reasons, it is essential that all agriculture operations and stakeholders have a working biosecurity plan in place. Biosecurity is the management practices incorporated into an operation to protect animals and crops from exposure to an infectious agent that can adversely affect productivity, profitability and human health.</p> </div><div class="column two"><p>Activities that can be incorporated into your  current management system to enhance  biosecurity include:  </p>
<ol>
<li>Require recent international travelers to  disinfect footwear and clothing before  working with livestock, feed, and  equipment.</li>
<li>Limit unknown visitors and animal  introduction to the farm until you receive  proper verification.</li>
<li>Establish and update records regularly of  visitors, deliveries, animals, feedstuffs, and  equipment moving on and off the farm.</li>
<li>Implement high standards of  hygiene/disinfectant.</li>
<li>Isolate new animals. Observe them closely  for at least a week before introducing them  into the existing herd.  </li>
<li>Purchase known source animals with health  history records.</li>
<li>Purchase feedstuffs and equipment from a  known source with a strong commitment to  hygiene and biosecurity.  </li>
<li>Train all personnel on the importance of  biosecurity.  </li>
<li>Report ANY possible signs or death  possibly associated with foreign animal  disease to local, state or federal veterinarian.  Early detection is critical for quick  eradication and minimal economic damage.</li>
<li>Establish an effective herd health program.</li>
<li>Post rules concerning biosecurity measures  in place.</li>
<li>Establish property perimeter fencing</li>
</ol></div></div><div class="row single"><div class="column one">Cooperating agencies: Washington State University, U.S. Department of Agriculture, and Washington Counties. WSU Extension programs and
employment are available to all without discrimination. Evidence of noncompliance may be reported through your local WSU Extension office.</div></div>',
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_RETURNTRANSFER , 1);
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$response = curl_exec($ch);

header('Content-type: application/pdf');

header('Content-Disposition: inline; filename=filename.pdf');

echo $response;

//close connection
curl_close($ch);