function set_menu_active(text){
  $(".sf-menu li a:contains("+text+")").parent().addClass("current");
}

function remove_content_divider(){
  $(".vr-border-1").attr("style", "background:none");
  $(".rightpane").attr("style", "width:80%;padding-left:7%");
}

function hide_lightbox(container){
  container.fadeOut();//attr("style", "display:none");
  $("#fade").attr("style", "display:none");
}
  
function show_lightbox(container){
  container.fadeIn();//attr("style", "display:block");
  $("#fade").attr("style", "display:block");
}

function replace_content(container, url){
  container.children('div:first').load(url);
}

function show_replace_content(container, url){
  replace_content(container, url);
  show_lightbox(container);  
}

function truncate(element) {
    $(element + ' p').css({display: 'inline'});

    var theText = $(element).html();        // Original Text
    var item;                               // Current tag or text area being iterated
    var convertedText = '<span class="revealText">';    // String that will represent the finished result
    var limit = 154;                        // Max characters (though last word is retained in full)
    var counter = 0;                        // Track how far we've come (compared to limit)
    var lastTag;                            // Hold a reference to the last opening tag
    var lastOpenTags = [];                  // Stores an array of all opening tags (they get removed as tags are closed)
    var nowHiding = false;                  // Flag to set to show that we're now in the hiding phase

    theText = theText.replace(/[\s\n\r]{2,}/g, ' ');            // Consolidate multiple white-space characters down to one. (Otherwise the counter will count each of them.)
    theText = theText.replace(/(<[^<>]+>)/g,'|*|SPLITTER|*|$1|*|SPLITTER|*|');                      // Find all tags, and add a splitter to either side of them.
    theText = theText.replace(/(\|\*\|SPLITTER\|\*\|)(\s*)\|\*\|SPLITTER\|\*\|/g,'$1$2');           // Find consecutive splitters, and replace with one only.
    theText = theText.replace(/^[\s\t\r]*\|\*\|SPLITTER\|\*\||\|\*\|SPLITTER\|\*\|[\s\t\r]*$/g,''); // Get rid of unnecessary splitter (if any) at beginning and end.
    theText = theText.split(/\|\*\|SPLITTER\|\*\|/);            // Split theText where there's a splitter. Now we have an array of tags and words.

    for(var i in theText) {                                     // Iterate over the array of tags and words.
        item = theText[i];                                      // Store current iteration in a variable (for convenience)
        lastTag = lastOpenTags[lastOpenTags.length - 1];        // Store last opening tag in a variable (for convenience)
        if( !item.match(/<[^<>]+>/) ) {                         // If 'item' is not a tag, we have text
            if(lastTag && item.charAt(0) == ' ' && !lastTag[1].match(/span|SPAN/)) item = item.substr(1);   // Remove space from beginning of block elements (like IE does) to make results match cross browser
            if(!nowHiding) {                                        // If we haven't started hiding yet...
                counter += item.length;                             // Add length of text to counter.
                if(counter >= limit) {                              // If we're past the limit...
                    var length = item.length - 1;                   // Store the current item's length (minus one).
                    var position = (length) - (counter - limit);    // Get the position in the text where the limit landed.
                    while(position != length) {                     // As long as we haven't reached the end of the text...
                        if( !!item.charAt(position).match(/[\s\t\n]/) || position == length )   // Check if we have a space, or are at the end.
                            break;                                  // If so, break out of loop.
                        else position++;                            // Otherwise, increment position.
                    }
                    if(position != length) position--;
                    var closeTag = '', openTag = '';                // Initialize open and close tag for last tag.
                    if(lastTag) {                                   // If there was a last tag,
                        closeTag = '</' + lastTag[1] + '>';         // set the close tag to whatever the last tag was,
                        openTag = '<' + lastTag[1] + lastTag[2] + '>';  // and the open tag too.
                    }
                    // Create transition from revealed to hidden with the appropriate tags, and add it to our result string
                    var transition = '<span class="readMore"><span class="ellipsis">...</span><span class="readMoreText"> [Read More] </span></span>' + closeTag + '</span><span class="hiddenText">' + openTag;
                    convertedText += (position == length)   ? (item).substr(0) + transition
                                                                : (item).substr(0,position + 1) + transition + (item).substr(position + 1).replace(/^\s/, '&nbsp;');
                    nowHiding = true;       // Now we're hiding.
                    continue;               // Break out of this iteration.
                }
            }
        } else {                                                // Item wasn't text. It was a tag.
            if(!item.match(/<br>|<BR>/)) {                      // If it is a <br /> tag, ignore it.
                if(!item.match(/\//)) {                         // If it is not a closing tag...
                    lastOpenTags.push(item.match(/<(\w+)(\s*[^>]*)>/));     // Store it as the most recent open tag we've found.
                } else {                                                    // If it is a closing tag.
                    if(item.match(/<\/(\w+)>/)[1] == lastOpenTags[lastOpenTags.length - 1][1]) {    // If the closing tag is a paired match with the last opening tag...
                        lastOpenTags.pop();                                                         // ...remove the last opening tag.
                    }
                    if(item.match(/<\/[pP]>/)) {            // Check if it is a closing </p> tag
                        convertedText += ('<span class="paragraphBreak"><br> <br> </span>');    // If so, add two line breaks to form paragraph
                    }
                }
            }
        }   
        convertedText += (item);            // Add the item to the result string.
    }
    convertedText += ('</span>');           // After iterating over all tags and text, close the hiddenText tag.
    $(element).html(convertedText);         // Update the container with the result.
}