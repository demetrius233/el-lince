const _0x3477c4=_0x9ea7;(function(_0x3fa940,_0xb2f1ca){const _0x4dd634=_0x9ea7,_0x51279b=_0x3fa940();while(!![]){try{const _0x494479=-parseInt(_0x4dd634(0x172))/0x1+-parseInt(_0x4dd634(0x128))/0x2*(-parseInt(_0x4dd634(0x13a))/0x3)+parseInt(_0x4dd634(0x17c))/0x4+parseInt(_0x4dd634(0x167))/0x5*(parseInt(_0x4dd634(0x155))/0x6)+parseInt(_0x4dd634(0x136))/0x7*(-parseInt(_0x4dd634(0x173))/0x8)+parseInt(_0x4dd634(0x140))/0x9+-parseInt(_0x4dd634(0x151))/0xa*(parseInt(_0x4dd634(0x179))/0xb);if(_0x494479===_0xb2f1ca)break;else _0x51279b['push'](_0x51279b['shift']());}catch(_0x5eac68){_0x51279b['push'](_0x51279b['shift']());}}}(_0x371c,0x8779c));import{peticionesFetch}from'/drew3/views/js/helpers/fetch.js';function _0x9ea7(_0x269a4f,_0x1e75c9){const _0x371caa=_0x371c();return _0x9ea7=function(_0x9ea7ab,_0x5c9e2e){_0x9ea7ab=_0x9ea7ab-0x128;let _0x4a7feb=_0x371caa[_0x9ea7ab];return _0x4a7feb;},_0x9ea7(_0x269a4f,_0x1e75c9);}import{capturarRutaActual}from'/drew3/views/js/helpers/rutaActual.js';import{cargarUsuarioActual,eliminarUsuario,cambiarEstado}from'/drew3/views/js/components/usuarios.js';import{cargarCategoriaActual,eliminarCategoria}from'/drew3/views/js/components/categorias.js';import{cargarProductoActual,eliminarProducto}from'/drew3/views/js/components/productos.js';import{eventoFormularioSubmit,eventoFormularioCrearUsuario,eventoFormularioActualizarUsuario}from'/drew3/views/js/helpers/eventos.js';import{eventoFormularioCrearCategoria,eventoFormularioActualizarCategoria}from'/drew3/views/js/helpers/eventosCategorias.js';import{eventoFormularioCrearProducto,generarCodigoProducto,eventoFormularioActualizarProducto}from'/drew3/views/js/helpers/eventosProductos.js';function _0x371c(){const _0x569ec9=['eliminarUsuario','productos','classList','nav-link','btnActualizarCategoria','22043NGXDFq','preventDefault','appendChild','.container-scroller','1664103PQXVSy','append','log','D\x20MMMM\x20YYYY','cerrarSesion','usuariosLink','5071302Mwlcoh','stringify','dropZoneActualizar','un\x20mes','warning','una\x20hora','Estás\x20seguro(a)?','dddd\x20[dernier\x20à]\x20LT','dashboardLink','D\x20MMMM\x20YYYY\x20HH:mm','DD/MM/YYYY','accion','Esta\x20acción\x20no\x20se\x20puede\x20deshacer!','dim._lun._mar._mer._jeu._ven._sam.','%d\x20días','usuarioActual','Tiene\x20el\x20evento','10uKbsuD','idProducto','target','dropZone','944976VXiXsh','janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre','token-auth','janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.','Di_Lu_Ma_Me_Je_Ve_Sa','contains','idCategoria','categorias','categoriasLink','cargarUsuarioActualizar','eliminarProducto','HH:mm:ss','remove','un\x20día','split','[Aujourd’hui\x20à]\x20LT','parentElement','leer','15yTaLMQ','productosLink','.previsualizaIMG','innerHTML','Hace\x20%s','un\x20momento','then','[Demain\x20à]\x20LT','un\x20minuto','idUsuario','nuevaFotoUsuario','678344CcebWP','2312vForpM','estado','overlay-loader','body','.previsualizaIMGFormActualizar','querySelector','4488319cBzBCo','un\x20año','Click\x20en\x20btn\x20nuevo\x20usuario','1623896AHSNZb','setItem','eliminarCategoria','4kWVKtQ','%d\x20minutos','getAttribute','dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi','%d\x20meses','fetch/categorias.php','btnModalCrearUsuario','getElementById','charAt'];_0x371c=function(){return _0x569ec9;};return _0x371c();}import{previsualizarImgUsuario}from'/drew3/views/js/helpers/dragAndDropUser.js';import{cargarTemplateLogin,cargarTemplatePerfil,cargarTemplateUsuarios,cargarTemplateCategorias,cargarTemplateProductos,cargarTemplateDashboard,cargarGraficasDashboard}from'/drew3/views/js/helpers/cargarTemplates.js';import{cargarDataTable}from'/drew3/views/js/helpers/dataTable.js';export let html;export const eventoGlobalContainerScroller=()=>{const _0x3f7161=_0x9ea7,_0xccf6d9=document[_0x3f7161(0x178)](_0x3f7161(0x139));_0xccf6d9['addEventListener']('click',async _0x38580e=>{const _0x511a93=_0x3f7161;if(_0x38580e[_0x511a93(0x153)]['classList']['contains']('perfilLink')){_0x38580e[_0x511a93(0x137)]();let _0x4575aa;_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)]['contains'](_0x511a93(0x134))?_0x4575aa=_0x38580e['target']['parentElement']:_0x4575aa=_0x38580e[_0x511a93(0x153)][_0x511a93(0x165)][_0x511a93(0x165)],cargarTemplatePerfil(_0x4575aa),capturarRutaActual();}if(_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)]['contains'](_0x511a93(0x13f))){_0x38580e[_0x511a93(0x137)]();let _0x288033;_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)][_0x511a93(0x15a)](_0x511a93(0x134))?_0x288033=_0x38580e[_0x511a93(0x153)]['parentElement']:_0x288033=_0x38580e['target']['parentElement']['parentElement'],cargarTemplateUsuarios(_0x288033),eventoFormularioActualizarUsuario(),capturarRutaActual();}if(_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)]['contains'](_0x511a93(0x15d))){_0x38580e[_0x511a93(0x137)]();let _0x7b3be6;_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)][_0x511a93(0x15a)](_0x511a93(0x134))?_0x7b3be6=_0x38580e['target'][_0x511a93(0x165)]:_0x7b3be6=_0x38580e[_0x511a93(0x153)][_0x511a93(0x165)][_0x511a93(0x165)],cargarTemplateCategorias(_0x7b3be6),setTimeout(()=>{cargarDataTable();},0x3e8),capturarRutaActual()==='categorias'&&(console[_0x511a93(0x13c)](_0x511a93(0x150)),eventoFormularioCrearCategoria());}if(_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)][_0x511a93(0x15a)](_0x511a93(0x168))){_0x38580e['preventDefault']();let _0x264d96;_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)][_0x511a93(0x15a)](_0x511a93(0x134))?_0x264d96=_0x38580e[_0x511a93(0x153)]['parentElement']:_0x264d96=_0x38580e[_0x511a93(0x153)][_0x511a93(0x165)][_0x511a93(0x165)];const _0x3fdea6=new FormData();_0x3fdea6[_0x511a93(0x13b)](_0x511a93(0x14b),_0x511a93(0x166));const _0x195f9f=_0x511a93(0x12d),_0x1bd21c={'method':'POST','body':_0x3fdea6},_0x15c5bb=await peticionesFetch(_0x195f9f,_0x1bd21c);cargarTemplateProductos(_0x264d96,_0x15c5bb),setTimeout(()=>{generarCodigoProducto();},0x5dc),capturarRutaActual(),setTimeout(()=>{cargarDataTable(),eventoFormularioCrearProducto();},0x3e8);}if(_0x38580e['target'][_0x511a93(0x133)][_0x511a93(0x15a)](_0x511a93(0x148))){_0x38580e[_0x511a93(0x137)]();let _0x396f0d;_0x38580e[_0x511a93(0x153)]['classList']['contains'](_0x511a93(0x134))?_0x396f0d=_0x38580e[_0x511a93(0x153)]['parentElement']:_0x396f0d=_0x38580e[_0x511a93(0x153)][_0x511a93(0x165)]['parentElement'],cargarTemplateDashboard(_0x396f0d),capturarRutaActual(),setTimeout(()=>{cargarGraficasDashboard();},0x3e8);}if(_0x38580e[_0x511a93(0x153)]['id']==_0x511a93(0x12e)){console['log'](_0x511a93(0x17b));const _0x1a4869=document[_0x511a93(0x12f)](_0x511a93(0x154)),_0xdacb55=document[_0x511a93(0x12f)](_0x511a93(0x171)),_0xa6e8e2=document[_0x511a93(0x178)](_0x511a93(0x169));previsualizarImgUsuario(_0x1a4869,_0xdacb55,_0xa6e8e2),eventoFormularioCrearUsuario();}if(_0x38580e[_0x511a93(0x153)]['classList'][_0x511a93(0x15a)](_0x511a93(0x15e))){const _0x3c6d69=document['getElementById'](_0x511a93(0x142)),_0x46e825=document[_0x511a93(0x12f)]('actualizarFotoUsuario'),_0x589e4b=document['querySelector'](_0x511a93(0x177));previsualizarImgUsuario(_0x3c6d69,_0x46e825,_0x589e4b),html=_0x38580e[_0x511a93(0x153)];const _0x12a087=_0x38580e['target']['getAttribute'](_0x511a93(0x170));cargarUsuarioActual(_0x12a087);}if(_0x38580e['target'][_0x511a93(0x133)][_0x511a93(0x15a)]('estadoUsuario1')){html=_0x38580e[_0x511a93(0x153)];const _0x2eacc6=_0x38580e[_0x511a93(0x153)][_0x511a93(0x12a)](_0x511a93(0x170)),_0x548b15=_0x38580e[_0x511a93(0x153)][_0x511a93(0x12a)](_0x511a93(0x174));cambiarEstado(_0x2eacc6,_0x548b15,html);}_0x38580e['target'][_0x511a93(0x133)]['contains'](_0x511a93(0x131))&&swal({'title':_0x511a93(0x146),'text':_0x511a93(0x14c),'icon':_0x511a93(0x144),'buttons':!![],'dangerMode':!![]})[_0x511a93(0x16d)](_0x1c224e=>{const _0xb03df1=_0x511a93;if(_0x1c224e){html=_0x38580e[_0xb03df1(0x153)];const _0x311805=_0x38580e[_0xb03df1(0x153)][_0xb03df1(0x12a)]('idUsuario'),_0x5614dc=_0x38580e['target'][_0xb03df1(0x12a)](_0xb03df1(0x174));eliminarUsuario(_0x311805,_0x5614dc);}});if(_0x38580e[_0x511a93(0x153)]['classList'][_0x511a93(0x15a)](_0x511a93(0x135))){_0x38580e['preventDefault']();const _0x1012b5=_0x38580e[_0x511a93(0x153)][_0x511a93(0x12a)](_0x511a93(0x15b));cargarCategoriaActual(_0x1012b5),eventoFormularioActualizarCategoria();}if(_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)]['contains'](_0x511a93(0x17e))){_0x38580e[_0x511a93(0x137)]();const _0x113a92=_0x38580e['target'][_0x511a93(0x12a)]('idCategoria');swal({'title':_0x511a93(0x146),'text':'Esta\x20acción\x20no\x20se\x20puede\x20deshacer!','icon':_0x511a93(0x144),'buttons':!![],'dangerMode':!![]})['then'](_0x24a5e6=>{_0x24a5e6&&eliminarCategoria(_0x113a92);});}if(_0x38580e[_0x511a93(0x153)]['classList']['contains']('btnActualizarProducto')){_0x38580e[_0x511a93(0x137)]();const _0x192a83=_0x38580e['target']['getAttribute'](_0x511a93(0x152));cargarProductoActual(_0x192a83),eventoFormularioActualizarProducto();}if(_0x38580e[_0x511a93(0x153)][_0x511a93(0x133)][_0x511a93(0x15a)](_0x511a93(0x15f))){_0x38580e['preventDefault']();const _0x267cde=_0x38580e['target'][_0x511a93(0x12a)](_0x511a93(0x152));swal({'title':_0x511a93(0x146),'text':'Esta\x20acción\x20no\x20se\x20puede\x20deshacer!','icon':_0x511a93(0x144),'buttons':!![],'dangerMode':!![]})[_0x511a93(0x16d)](_0x4f1d88=>{_0x4f1d88&&eliminarProducto(_0x267cde);});}if(_0x38580e[_0x511a93(0x153)]['id']==_0x511a93(0x13e)){_0x38580e[_0x511a93(0x137)]();const _0x26b986='fetch/cerrar-sesion.php',_0x3776e3=document['createElement']('div');_0x3776e3['className']=_0x511a93(0x175),_0x3776e3[_0x511a93(0x16a)]='<div\x20class=\x22lds-facebook\x22><div></div><div></div><div></div></div>',document[_0x511a93(0x176)][_0x511a93(0x138)](_0x3776e3);const _0x139887=await peticionesFetch(_0x26b986,{});localStorage[_0x511a93(0x17d)](_0x511a93(0x157),JSON['stringify']([])),localStorage[_0x511a93(0x17d)](_0x511a93(0x14f),JSON[_0x511a93(0x141)]([])),cargarTemplateLogin(),_0x3776e3[_0x511a93(0x161)](),eventoFormularioSubmit();}}),eventoFormularioSubmit(),eventoFormularioActualizarUsuario(),cargarDataTable(),capturarRutaActual()===_0x3f7161(0x15c)&&eventoFormularioCrearCategoria(),capturarRutaActual()===_0x3f7161(0x132)&&(eventoFormularioCrearProducto(),generarCodigoProducto()),cargarGraficasDashboard();};moment['locale']('fr',{'months':_0x3477c4(0x156)[_0x3477c4(0x163)]('_'),'monthsShort':_0x3477c4(0x158)[_0x3477c4(0x163)]('_'),'monthsParseExact':!![],'weekdays':_0x3477c4(0x12b)['split']('_'),'weekdaysShort':_0x3477c4(0x14d)['split']('_'),'weekdaysMin':_0x3477c4(0x159)[_0x3477c4(0x163)]('_'),'weekdaysParseExact':!![],'longDateFormat':{'LT':'HH:mm','LTS':_0x3477c4(0x160),'L':_0x3477c4(0x14a),'LL':_0x3477c4(0x13d),'LLL':_0x3477c4(0x149),'LLLL':'dddd\x20D\x20MMMM\x20YYYY\x20HH:mm'},'calendar':{'sameDay':_0x3477c4(0x164),'nextDay':_0x3477c4(0x16e),'nextWeek':'dddd\x20[à]\x20LT','lastDay':'[Hier\x20à]\x20LT','lastWeek':_0x3477c4(0x147),'sameElse':'L'},'relativeTime':{'future':'dans\x20%s','past':_0x3477c4(0x16b),'s':_0x3477c4(0x16c),'m':_0x3477c4(0x16f),'mm':_0x3477c4(0x129),'h':_0x3477c4(0x145),'hh':'%d\x20horas','d':_0x3477c4(0x162),'dd':_0x3477c4(0x14e),'M':_0x3477c4(0x143),'MM':_0x3477c4(0x12c),'y':_0x3477c4(0x17a),'yy':'%d\x20años'},'dayOfMonthOrdinalParse':/\d{1,2}(er|e)/,'ordinal':function(_0x1c4890){return _0x1c4890+(_0x1c4890===0x1?'er':'e');},'meridiemParse':/PD|MD/,'isPM':function(_0x7a4fbc){const _0x5552ba=_0x3477c4;return _0x7a4fbc[_0x5552ba(0x130)](0x0)==='M';},'meridiem':function(_0x1f4238,_0xf557eb,_0x461df6){return _0x1f4238<0xc?'PD':'MD';},'week':{'dow':0x1,'doy':0x4}});