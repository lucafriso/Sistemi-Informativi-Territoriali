package Progetto;

import java.util.ArrayList;

import org.python.modules.newmodule;

import com.vividsolutions.jts.geom.Coordinate;
import com.vividsolutions.jts.geom.CoordinateFilter;
import com.vividsolutions.jts.geom.CoordinateSequenceComparator;
import com.vividsolutions.jts.geom.CoordinateSequenceFilter;
import com.vividsolutions.jts.geom.Envelope;
import com.vividsolutions.jts.geom.Geometry;
import com.vividsolutions.jts.geom.GeometryComponentFilter;
import com.vividsolutions.jts.geom.GeometryFactory;
import com.vividsolutions.jts.geom.GeometryFilter;
import com.vividsolutions.jts.geom.Point;
import com.vividsolutions.jump.feature.AttributeType;
import com.vividsolutions.jump.feature.BasicFeature;
import com.vividsolutions.jump.feature.Feature;
import com.vividsolutions.jump.feature.FeatureCollection;
import com.vividsolutions.jump.feature.FeatureDataset;
import com.vividsolutions.jump.feature.FeatureSchema;
import com.vividsolutions.jump.workbench.model.Layer;
import com.vividsolutions.jump.workbench.plugin.AbstractPlugIn;
import com.vividsolutions.jump.workbench.plugin.PlugInContext;
import com.vividsolutions.jump.workbench.ui.MultiInputDialog;
import com.vividsolutions.jump.workbench.ui.plugin.FeatureInstaller;

public class PRGPlugin extends AbstractPlugIn{
	public void initialize(PlugInContext context) throws Exception {
		FeatureInstaller featureInstaller = new FeatureInstaller(context.getWorkbenchContext());
		featureInstaller.addMainMenuPlugin(
				this,
				new String[] {"Corso Gis", "Progetto"},
				this.getName(),
				false,
				null,
				null);
	}
	
	@Override
	public String getName() {
		return "PRG";
	}
	
public boolean execute(PlugInContext context) {
		
		System.out.println( this.getName() + " started!" );
		
		//Genero il Mid
		
		MultiInputDialog mid = new MultiInputDialog( context.getWorkbenchFrame(), this.getName(), true );
		
		//Inserimento del layer contenente il Piano Regolatore generale
		String _prgLayer = "Selezionare il layer contenente il PRG";
		mid.addLayerComboBox( _prgLayer, null, context.getLayerManager() );
		
		//Inserimento del layer contenente la Variante di Piano
		String _varPianoLayer = "Selezionare il layer contenente la Variante di Piano";
		mid.addLayerComboBox( _varPianoLayer, null, context.getLayerManager() );
		
		mid.setVisible( true );	// dialog modale
		if( mid.wasOKPressed() == false )	return false;
				
		
		// Creazione dei layer 
		String layerPRGName = mid.getText( _prgLayer );
		Layer layerPRG = context.getLayerManager().getLayer(layerPRGName);
		String layerVarPianoName = mid.getText( _varPianoLayer );
		Layer layerVarPiano = context.getLayerManager().getLayer(layerVarPianoName);
		
		/*
		
		FeatureSchema fs = new FeatureSchema();
		
		fs.addAttribute( "id", AttributeType.INTEGER );
		fs.addAttribute( "geometry", AttributeType.GEOMETRY );
		FeatureCollection fc = new FeatureDataset( fs );

		Geometry bombGeometry = layerBomb.getFeatureCollectionWrapper().getFeatures().get(0).getGeometry();
		Coordinate[] bombCoordinates = bombGeometry.getCoordinates();
		
		Geometry bufferGeometry = bombGeometry.buffer(metri);
		
		Integer geomCounter = 0;
		
		Feature ff = new BasicFeature( fs );
		ff.setAttribute( 0, geomCounter++ );
		ff.setAttribute( 1, bufferGeometry );
		fc.add( ff );
		
		
		context.addLayer( "Output", "Buffer", fc );	
		
		FeatureCollection fcToEvacuate = new FeatureDataset( fs );
		
		System.out.println("Il numero di edifici da evacuare sono: " + layerEdifici.getFeatureCollectionWrapper().getFeatures().size());
		
		System.out.println("Gli edifici da evacuare sono: ");
		
		for( Feature f : layerEdifici.getFeatureCollectionWrapper().getFeatures() ) {
			
			Coordinate[] edificioCoordinates = f.getGeometry().getCoordinates();
			
			GeometryFactory gf = new GeometryFactory();
			
			edificiLoop : for (int i = 0; i < edificioCoordinates.length; i++) {
				Coordinate coordinate = edificioCoordinates[i];
				Point point = gf.createPoint(coordinate);
				if (bufferGeometry.contains(point)) {
					Feature fToAdd = new BasicFeature( fs );
					fToAdd.setAttribute( 0, geomCounter++ );
					fToAdd.setAttribute( 1, f.getGeometry() );
					fcToEvacuate.add(fToAdd);
					
					System.out.println(f.getAttribute("NUMERO")+": "+f.getAttribute("DESCRZ"));

					break edificiLoop;
				}
			}
		}
		
		
		
		context.addLayer( "Output", "ToEvacuate", fcToEvacuate );	
		*/
		return true;
		
	}

}
