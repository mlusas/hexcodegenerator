# hexcodegenerator
A simple Hex Code Generator for promo codes.

<h2>Description</h2>
I created this to help create simple promo codes for clients.  The txt file method was created for a previous client, but I may update this too include JSON, and potential SQL as outputs.  I prefer hex-based codes as they allow:
<ul>
<li>for simplicity on user entry (ie., no confusion between O and 0; or 1, I, and L), and</li>
<li>the hex codes can be turned into binary for faster storage.</li>
</ul>

<h2>Usage</h2>
``` php
// will create a txt file at /html/domain.com/codes/ with 10 codes at 16 hex-characters each.
$hexCodeGenerator = new HexCodeGenerator();
$hexCodeGenerator->createTextFileOfCodes("/html/domain.com/codes", 10, 16); 
```
