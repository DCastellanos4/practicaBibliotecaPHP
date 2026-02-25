/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package biblioteca;


public class Revista extends Documento {

    public Revista(){
        super();
    }
    public Revista(String cod,String til){
        super(cod,til);
    }
    public int plazoPrestamo(){
        return super.plazoPrestamo()/3;
    }
}
