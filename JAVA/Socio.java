

package biblioteca;


public class Socio extends Usuario {
    private static final int maxPrestamosASocios=20;
    private static final int limitePrestamosASocios=30;

    public Socio(){
        super();
    }
    public Socio(String dni,String nom){
        super(dni,nom,maxPrestamosASocios,limitePrestamosASocios);
    }
    public String toString(){
        return super.toString() + "Socio";
    }
}
