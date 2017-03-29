function List(){
	this.listSize = 0;
	this.pos=0;
	this.dataStore = [];
	this.clear=clear;
	this.find=find;
	this.toString=toString;
	this.insert=insert;
	this.append=append;
	this.remove=remove;
	this.front=front;
	this.end=end;
	this.prev=prev;
	this.next=next;
	this.length=length;
	this.currPos=currPos;
	this.moveTo=moveTo;
	this.contains=contains;
	this.getElement=getElement;

}
function front(){}
function end(){}
function prev(){}
function next(){}
function currPos(){}
function moveTo(){}
function contains(){}
function getElement(){}
function clear(){}
function append(element){
	this.dataStore[this.listSize++] = element;
}
function find(element){
	/*for(var i=0; i<this.dataStore.length; ++i){
		if(this.dataStore[i] == element){
			return i;
		}
	}
	return -1;*/
	this.dataStore.filter(function(value,i){
		print(value+'=='+element);
		return (value == element)?i:-1
	});
}
function remove(element){
	var foundAt = this.find(element);
	if(foundAt >= -1){
		this.dataStore.splice(foundAt, 1);
		--this.listSize;
		return true;
	}
	return false;
}

function length(){
	return this.listSize;
}
function toString(){
	return this.dataStore;
}
function insert(element, after){
	var insertPos = this.find(after);
	if(insertPos >= -1){
		this.dataStore.splice(insertPos+1, 0, element);
		++this.listSize;
		return true;
	}
	return false;
}
function clear(){
	delete this.dataStore;
	this.dataStore.length = 0;
	this.listSize = this.pos = 0;

}

var names = new List();
names.append("Cynthia");
names.append("Raymond");
names.append("Barbara");
print(names.toString());
names.remove("Raymond");
print(names.toString());
/*names.append("");
names.append("");
names.append("");
names.append("");*/