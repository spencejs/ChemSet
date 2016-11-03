<h3>Paragraphs</h3>
<p>All paragraphs are wrapped in <code>p</code> tags. Additionally, <code>p</code> elements can be wrapped with a <code>blockquote</code> element <em>if the <code>p</code> element is indeed a quote</em>. Historically, <code>blockquote</code> has been used purely to force indents, but this is now achieved using CSS. Reserve <code>blockquote</code> for quotes.</p>

<h3>Horizontal rule</h3>
<p>The <code>hr</code> element represents a paragraph-level thematic break, e.g. a scene change in a story, or a transition to another topic within a section of a reference book. The following extract from <cite>Pandora&#8217;s Star</cite> by Peter F. Hamilton shows two paragraphs that precede a scene change and the paragraph that follows it:</p>
<hr/>
<p>The Carlton AllLander drove Dudley home just after dawn. Like the astronomer, the vehicle was old and worn, but perfectly capable of doing its job.</p>

<h3>Pre-formatted text</h3>
<p>The <code>pre</code> element represents a block of pre-formatted text, in which structure is represented by typographic conventions rather than by elements. Such examples are an e-mail (with paragraphs indicated by blank lines, lists indicated by lines prefixed with a bullet), fragments of computer code (with structure indicated according to the conventions of that language) or displaying <abbr title="American Standard Code for Information Interchange">ASCII</abbr> art. Here&#8217;s an example showing the printable characters of <abbr>ASCII</abbr>:</p>
<div class="style-guide-example">
	<pre><code>&#32; ! " # $ % &amp; ' ( ) * + , - . /
0 1 2 3 4 5 6 7 8 9 : ; &lt; = &gt; ?
@ A B C D E F G H I J K L M N O
P Q R S T U V W X Y Z [ \ ] ^ _
` a b c d e f g h i j k l m n o
p q r s t u v w x y z { | } ~</code></pre>
</div>

<h3>Blockquotes</h3>
<p>The <code>blockquote</code> element represents a section that is being quoted from another source.</p>
<div class="style-guide-example">
	<blockquote cite="http://hansard.millbanksystems.com/commons/1947/nov/11/parliament-bill#column_206">
		<?php echo chemset_ipsum( 'paragraphs', 1 ); ?>
	</blockquote>
</div>