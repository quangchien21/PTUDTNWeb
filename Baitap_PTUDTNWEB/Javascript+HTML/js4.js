document.write("1. Oranges"); document.write("<br> 2. Apple");
document.write("<br> 3. Bannanas"); document.write("<br> 4. Cherries");
exp=prompt("Vui lòng hãy chọn một loại trái cây trong danh sách: ","");
switch(exp){
	case "Oranges": document.write("<br> Oranges are 15 pound");
	break;
	case "Apple": document.write("<br> Apple are 15 pound");
	break;
	case "Bannanas": document.write("<br> Bannanas are 15 pound");
	break;
	case "Cherries": document.write("<br> Cherries are 15 pound");
	break;
	default:
		document.write("<br> Sorry, We have no this kimd of fruit");
}