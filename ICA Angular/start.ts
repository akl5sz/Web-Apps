var userName = 'Angie';
console.log(userName);

//specifying the argument type and function return type
function shout(name) {
    return name.toUpperCase();
}
console.log(shout(userName));

//static type declaration
type carMakes = "Mazda" | "Honda";
//let myRide:carMakes = "Toyota"; //won't work because it's not one of the valid types
let myRide:carMakes = "Honda";

//generic
let garage = Array<carMakes>();
//garage.push("Volvo"); //not valid type
garage.push("Mazda"); //not valid type

//generic?
function addTwo(a:number, b:number):number{
    return a+b;
}

//interface
interface Musician {
    name:string;
    instrument: string;
}

class BandMember {
    name:string;
    instrument:string;
    writeSongs:boolean;
    constructor (name:string, instrument:string, writeSongs:boolean){
        this.name=name;
        this.instrument=instrument;
        this.writeSongs=writeSongs;
    }
}
const credits = new Array<BandMember>();
credits.push("donkey");
credits.push(new BandMember("joe","drums",false));
credits.push({name:"sue",instrument:"guitar",writeSongs:true});

//access specifier, short hand constructor 
class FarmAnimal {
    constructor (public locomotion: "swim" | "walk" | "fly", private weightInKilos:number){}
}

let zena = new FarmAnimal("swim", 10);
console.log(zena.locomotion);