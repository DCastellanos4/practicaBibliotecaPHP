/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package biblioteca;

/**
 *
 * @author carmen
 */
public class Libro extends Documento {
    private int añoPublicacion;

    public Libro(){
        super();
        añoPublicacion=0;
    }
    public Libro(String cod,String til,int anio){
        super(cod,til);
        añoPublicacion=anio;
    }
    public int getAñoPublicacion() {
        return añoPublicacion;
    }
    public void setAñoPublicacion(int añoPublicacion) {
        this.añoPublicacion = añoPublicacion;
    }
    public String toString(){
        return super.toString()+ " Año publicación: " + añoPublicacion;
    }
}
