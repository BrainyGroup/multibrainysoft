import{T as g,o as c,c as u,w as a,a as t,t as e,b as r,u as d,Z as f,i,f as x,g as _,j as l,h as w,F as v}from"./app-ec8b9ce4.js";import{_ as $}from"./AuthenticatedLayout-5a58aa4e.js";import{S as k}from"./SectionBorder-8a4073ef.js";import{E as S}from"./EditButton-f4fce661.js";import"./ApplicationLogo-2d8f8bcb.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-f0ec292f.js";const N={class:"mb-8 text-3xl font-bold"},P={class:"mx-4"},B={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},E={class:"flex items-center justify-between mb-6"},j={class:"hidden md:inline"},V={class:"hidden md:inline"},T={class:"bg-white rounded-md shadow overflow-x-auto"},A={class:"w-full whitespace-nowrap"},C={key:0,class:"text-left font-bold bg-green-200 hover:bg-green-100 focus-within:bg-green-100"},F={class:"pb-4 pt-6 px-6"},I={class:"pb-4 pt-6 px-6"},O={class:"pb-4 pt-6 px-6"},D={class:"pb-4 pt-6 px-6"},L={class:"pb-4 pt-6 px-6"},U={key:1,class:"text-left font-bold bg-red-200 hover:bg-red-100 focus-within:bg-red-100"},Y={class:"pb-4 pt-6 px-6"},Z={class:"pb-4 pt-6 px-6"},q={class:"pb-4 pt-6 px-6"},z={class:"pb-4 pt-6 px-6"},G={class:"pb-4 pt-6 px-6"},H={class:"hover:bg-gray-100 focus-within:bg-gray-100"},J={class:"border-t px-6 py-2"},K={class:"border-t px-6 py-2"},M=t("td",{class:"border-t px-6 py-2"},null,-1),Q=t("td",{class:"border-t px-6 py-2"},null,-1),R={class:"border-t px-6 py-2"},W={class:"hover:bg-gray-100 focus-within:bg-gray-100"},X={class:"border-t px-6 py-2"},tt={class:"border-t px-6 py-2"},et=t("td",{class:"border-t px-6 py-2"},null,-1),st=t("td",{class:"border-t px-6 py-2"},null,-1),ot=t("td",{class:"border-t px-6 py-2"},null,-1),at={class:"hover:bg-gray-100 focus-within:bg-gray-100"},nt={class:"border-t px-6 py-2"},rt={class:"border-t px-6 py-2"},dt={class:"border-t px-6 py-2"},ct={class:"border-t px-6 py-2"},it={class:"border-t px-6 py-2"},lt={class:"hover:bg-gray-100 focus-within:bg-gray-100"},_t={class:"border-t px-6 py-2"},pt={class:"border-t px-6 py-2"},bt=t("td",{class:"border-t px-6 py-2"},null,-1),ht=t("td",{class:"border-t px-6 py-2"},null,-1),yt=t("td",{class:"border-t px-6 py-2"},null,-1),ut={class:"hover:bg-gray-100 focus-within:bg-gray-100"},mt={class:"border-t px-6 py-2"},gt={class:"border-t px-6 py-2"},ft={class:"border-t px-6 py-2"},xt={class:"border-t px-6 py-2"},wt={class:"border-t px-6 py-2"},vt={class:"border-t px-6 py-2"},$t={class:"border-t px-6 py-2"},kt={class:"border-t px-6 py-2"},St={key:0,class:"border-t px-6 py-2"},Nt={key:1,class:"border-t px-6 py-2"},Pt={class:"border-t px-6 py-2"},Bt={key:0,class:"hover:bg-green-100 focus-within:bg-green-100 bg-green-200"},Et={class:"border-t px-6 py-2",colspan:"5"},jt={key:1,class:"hover:bg-red-100 focus-within:bg-red-100 bg-red-200"},Vt={class:"border-t px-6 py-2",colspan:"5"},Lt={__name:"Index",props:{pays:Array,month_gross:String,month_net:String,month_paye:String,month_gross:String,statutories:Array,pay_number:Number,deduction_sum:String,isPosted:Boolean,month_net_balance:String,month_paid:Number,month_paye_paid:Number,month_paye_balance:String,total:String,can:Object,translations:Object},setup(s){const y=s,o=(p,h)=>y.translations[p]||p,b=g({_method:"PUT",pay_number:y.pay_number}),m=p=>{b.post(route("pays.post",p),{preserveScroll:!0,onSuccess:()=>b.reset(),onError:()=>{b.errors.id&&nameInput.value.focus()}})};return(p,h)=>(c(),u($,{translations:s.translations},{header:a(()=>[t("h1",N,e(o("payroll summary"))+" "+e(s.pay_number),1)]),default:a(()=>[t("div",P,[t("div",B,[r(d(f),{title:`${o("payroll summary")}`},null,8,["title"]),t("div",E,[s.can.create_pay?(c(),u(d(i),{key:0,class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-t px-6 py-2 transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/pays/create"},{default:a(()=>[t("span",null,e(o("New")),1),t("span",j," "+e(o("Pay")),1)]),_:1})):x("",!0),r(d(i),{class:"inline-flex items-center px-6 py-2 bg-gray-800 border border-t px-6 py-2 transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/reports/monthly_create"},{default:a(()=>[t("span",null,e(o("Previous")),1),t("span",V," "+e(o("Pay")),1)]),_:1})]),t("div",T,[t("table",A,[t("thead",null,[s.isPosted?(c(),_("tr",C,[t("th",F,e(o("name")),1),t("th",I,e(o("amount")),1),t("th",O,e(o("paid")),1),t("th",D,e(o("balance")),1),t("th",L,e(o("details")),1)])):(c(),_("tr",U,[t("th",Y,e(o("name")),1),t("th",Z,e(o("amount")),1),t("th",q,e(o("paid")),1),t("th",z,e(o("balance")),1),t("th",G,e(o("details")),1)]))]),t("tbody",null,[t("tr",H,[t("td",J,e(o("total")),1),t("td",K,e(s.total),1),M,Q,t("td",R,[r(d(i),{href:`/pays/pay_details?pay_number=${s.pay_number}`},{default:a(()=>[l(e(o("details")),1)]),_:1},8,["href"])])]),t("tr",W,[t("td",X,e(o("gross")),1),t("td",tt,e(s.month_gross),1),et,st,ot]),t("tr",at,[t("td",nt,e(o("paye")),1),t("td",rt,e(s.month_paye),1),t("td",dt,e(s.month_paye_paid),1),t("td",ct,[r(d(i),{href:`/statutory_payments/create?pay_number=${s.pay_number}&statutory_id=9999&statutory_balance=${s.month_paye_balance}`},{default:a(()=>[l(e(s.month_paye_balance),1)]),_:1},8,["href"])]),t("td",it,[r(d(i),{href:`/reports/paye?pay_number=${s.pay_number}`},{default:a(()=>[l(e(o("details")),1)]),_:1},8,["href"])])]),t("tr",lt,[t("td",_t,e(o("deduction")),1),t("td",pt,e(s.deduction_sum),1),bt,ht,yt]),t("tr",ut,[t("td",mt,[r(d(i),{href:`/pays/nets?pay_number=${s.pay_number}`},{default:a(()=>[l(e(o("net")),1)]),_:1},8,["href"])]),t("td",gt,e(s.month_net),1),t("td",ft,e(s.month_net-s.month_net_balance),1),t("td",xt,[r(d(i),{href:`/pays/net_by_bank?pay_number=${s.pay_number}`},{default:a(()=>[l(e(s.month_net_balance),1)]),_:1},8,["href"])]),t("td",wt,[r(d(i),{href:`/pays/net_by_bank?pay_number=${s.pay_number}`},{default:a(()=>[l(e(o("net by bank")),1)]),_:1},8,["href"])])]),(c(!0),_(v,null,w(s.statutories,n=>(c(),_("tr",{key:n.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",vt,e(n.statutory_name),1),t("td",$t,e(n.total_amount),1),t("td",kt,e(n.total_amount-n.balance),1),n.balance>0?(c(),_("td",St,[r(d(i),{href:`/statutory_payments/create?pay_number=${s.pay_number}&statutory_id=${n.statutory_id}&statutory_balance=${n.balance}`},{default:a(()=>[l(e(n.balance),1)]),_:2},1032,["href"])])):(c(),_("td",Nt,e(n.balance),1)),t("td",Pt,[r(d(i),{href:`/pays/statutory_list?pay_number=${s.pay_number}&statutory_id=${n.statutory_id}`},{default:a(()=>[l(e(o("details")),1)]),_:2},1032,["href"])])]))),128)),s.isPosted?(c(),_("tr",Bt,[t("td",Et,e(o("posted")),1)])):(c(),_("tr",jt,[t("td",Vt,[l(e(o("do you want to post?"))+" ",1),r(S,{onEdit:h[0]||(h[0]=n=>m(`${s.pay_number}`))},{default:a(()=>[l("Yes Post Now")]),_:1})])]))])])])]),r(k)])]),_:1},8,["translations"]))}};export{Lt as default};
