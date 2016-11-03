<h3>Ordered list</h3>
<p>The <code>ol</code> element denotes an ordered list, and various numbering schemes are available through the CSS (including 1,2,3&#8230; a,b,c&#8230; i,ii,iii&#8230; and so on). Each item requires a surrounding <code>&lt;li&gt;</code> and <code>&lt;/li&gt;</code> tag, to denote individual items within the list (as you may have guessed, <code>li</code> stands for list item).</p>
<div class="style-guide-example">
	<ol>
		<li>This is an ordered list.</li>
		<li>
			This is the second item, which contains a sub list
			<ol>
				<li>This is the sub list, which is also ordered.</li>
				<li>It has two items.</li>
			</ol>
		</li>
		<li>This is the final item on this list.</li>
	</ol>
</div>

<h3>Unordered list</h3>
<p>The <code>ul</code> element denotes an unordered list (ie. a list of loose items that don&#8217;t require numbering, or a bulleted list). Again, each item requires a surrounding <code>&lt;li&gt;</code> and <code>&lt;/li&gt;</code> tag, to denote individual items. Here is an example list showing the constituent parts of the British Isles:</p>
<div class="style-guide-example">
	<ul>
		<li>
			United Kingdom of Great Britain and Northern Ireland:
			<ul>
				<li>England</li>
				<li>Scotland</li>
				<li>Wales</li>
				<li>Northern Ireland</li>
			</ul>
		</li>
		<li>Republic of Ireland</li>
		<li>Isle of Man</li>
		<li>
			Channel Islands:
			<ul>
				<li>Bailiwick of Guernsey</li>
				<li>Bailiwick of Jersey</li>
			</ul>
		</li>
	</ul>
</div>
<p>Sometimes we may want each list item to contain block elements, typically a paragraph or two.</p>
<div class="style-guide-example">
	<ul>
		<li>
			<?php echo chemset_ipsum( 'paragraphs', 1 ); ?>
		</li>
		<li>
			<?php echo chemset_ipsum( 'paragraphs', 1 ); ?>
		</li>
		<li>
			<?php echo chemset_ipsum( 'paragraphs', 1 ); ?>
		</li>
	</ul>
</div>

<h3>Definition list</h3>
<p>The <code>dl</code> element is for another type of list called a definition list. Instead of list items, the content of a <code>dl</code> consists of <code>dt</code> (Definition Term) and <code>dd</code> (Definition description) pairs. Though it may be called a &#8220;definition list&#8221;, <code>dl</code> can apply to other scenarios where a parent/child relationship is applicable. For example, it may be used for marking up dialogues, with each <code>dt</code> naming a speaker, and each <code>dd</code> containing his or her words.</p>
<div class="style-guide-example">
	<dl>
		<dt>This is a term.</dt>
		<dd>This is the definition of that term, which both live in a <code>dl</code>.</dd>
		<dt>Here is another term.</dt>
		<dd>And it gets a definition too, which is this line.</dd>
		<dt>Here is term that shares a definition with the term below.</dt>
		<dt>Here is a defined term.</dt>
		<dd><code>dt</code> terms may stand on their own without an accompanying <code>dd</code>, but in that case they <em>share</em> descriptions with the next available <code>dt</code>. You may not have a <code>dd</code> without a parent <code>dt</code>.</dd>
	</dl>
</div>