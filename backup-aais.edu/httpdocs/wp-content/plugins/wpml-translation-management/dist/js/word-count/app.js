!function(t){var e={};function i(n){if(e[n])return e[n].exports;var o=e[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,i),o.l=!0,o.exports}i.m=t,i.c=e,i.d=function(t,e,n){i.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:n})},i.r=function(t){Object.defineProperty(t,"__esModule",{value:!0})},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="",i(i.s=2)}([function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=function(){function t(t,e){for(var i=0;i<e.length;i++){var n=e[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,i,n){return i&&t(e.prototype,i),n&&t(e,n),e}}();var o=function(){function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.$=e,this.status=null,this.timeout=null}return n(t,[{key:"init",value:function(){var t=this;this.openLink=this.$(".js-word-count-dialog-open"),this.openLink.click(function(e){e.preventDefault(),t.openDialog()}),"#words-count"===window.location.hash&&this.openDialog()}},{key:"openDialog",value:function(){var t=this;this.dialogInit(),this.dialog.dialog({dialogClass:"word-count-dialog wpml-dialog otgs-ui-dialog",resizable:!1,modal:!0,width:450,autoResize:!0,title:this.openLink.data("dialog-title"),closeOnEscape:!0,buttons:[{text:this.openLink.data("cancel"),class:"alignleft button-secondary",click:function(e){return t.cancelCount(e)}}],open:function(){return t.repositionDialog()},close:function(){return t.restoreLegacyUIStyle()}})}},{key:"dialogInit",value:function(){var t=this;if(this.$("#jquery-ui-style-css").attr("disabled","disabled"),!this.dialog){var e=this.openLink.data("loading-text");this.dialog=this.$('<div class="js-word-count-dialog"><span class="spinner is-active"></span>'+e+"</div>"),this.fetchReportView(),this.initDialogEvents(),this.$(window).resize(function(){return t.repositionDialog()})}}},{key:"restoreLegacyUIStyle",value:function(){this.$("#jquery-ui-style-css").removeAttr("disabled")}},{key:"setDialogContent",value:function(t){this.$(".js-word-count-dialog").html(t)}},{key:"setStatus",value:function(t){var e=this;this.status=t,clearTimeout(this.timeout),"in-progress"===t?(this.dialog.find(".requested-type, .start-count").prop("disabled",!0),this.dialog.find(".spinner").addClass("is-active"),this.timeout=setTimeout(function(){return e.fetchReportView()},5e3)):"completed"===t&&(this.dialog.find(".requested-type, .start-count").prop("disabled",!1),this.dialog.find(".spinner").removeClass("is-active"))}},{key:"fetchReportView",value:function(){var t=this;this.sendAjax({action:"wpml_word_count_get_report"}).then(function(e){"completed"!==t.status&&(t.setStatus(e.status),t.setDialogContent(e.report),t.repositionDialog())})}},{key:"repositionDialog",value:function(){this.$(".otgs-ui-dialog .ui-dialog-content").css({"max-height":this.$(window).height()-180}),this.$(".otgs-ui-dialog").css({"max-width":"95%"}),this.dialog.dialog("option","position",{my:"center",at:"center",of:window})}},{key:"initDialogEvents",value:function(){var t=this;this.dialog.on("click",".start-count",function(e){return t.startCount(e)}),this.dialog.on("click",".cancel-count",function(e){return t.cancelCount(e)}),this.dialog.on("change",".requested-type",function(){return t.selectedTypesChanged()})}},{key:"startCount",value:function(t){var e=this;t.preventDefault(),this.setStatus("in-progress");var i={post_types:[],package_kinds:[]};this.dialog.find(".requested-type:checked").each(function(t,n){var o=e.$(n);i[o.data("group")].push(o.data("type"));var s=o.closest("tr");s.removeClass("pending").removeClass("completed").addClass("in-progress"),s.find(".js-row-count-words, .js-row-completed-items").text(0)}),this.dialog.find(".js-total-completed-items").text("-"),this.dialog.find(".js-total-count-words").text("-");var n={action:"wpml_word_count_start_count",requested_types:i};this.sendAjax(n).then(function(){return e.fetchReportView()})}},{key:"cancelCount",value:function(t){t.preventDefault(),this.setStatus("completed");this.sendAjax({action:"wpml_word_count_cancel_count"}),this.dialog.dialog("close")}},{key:"selectedTypesChanged",value:function(){var t=this.dialog.find(".requested-type:checked"),e=this.dialog.find(".start-count");t.length?e.prop("disabled",!1):e.prop("disabled",!0)}},{key:"sendAjax",value:function(t){return t.nonce=this.openLink.data("nonce"),t.module="wpml_word_count",this.$.post(ajaxurl,t).then(function(t){if(t.success)return t.data})}}]),t}();e.default=o},function(t,e,i){"use strict";var n,o=i(0),s=(n=o)&&n.__esModule?n:{default:n};jQuery(document).ready(function(t){new s.default(t).init()})},function(t,e,i){t.exports=i(1)}]);
//# sourceMappingURL=app.js.map